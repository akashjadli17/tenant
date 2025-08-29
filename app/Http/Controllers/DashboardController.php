<?php

namespace App\Http\Controllers;

use App\Notifications\PackageExpiringSoon;
use App\Models\Package;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Common variables
        $totalProperties = 0;
        $totalUnits      = 0;
        $totalInvoice    = 0;
        $totalExpense    = 0;
        $packages        = collect();
        $showPackages    = false;
        $daysLeft        = null;

        if ($user->user_type === 'admin') {
            // Full stats
            $totalProperties = Property::count();
            $totalUnits      = Unit::count();

            $showPackages = $user->shouldSeePackageChooser(10);
            $daysLeft     = $user->daysUntilPackageExpires();

            $packages = $showPackages
                ? Package::where('status', 1)->orderBy('price')->get()
                : collect();

            // Notify if package expiring soon
            if (!is_null($daysLeft) && $daysLeft > 0 && $daysLeft <= 10) {
                $already = $user->notifications()
                    ->where('type', PackageExpiringSoon::class)
                    ->whereJsonContains('data->expires_at', optional($user->package_expires_at)->toDateString())
                    ->exists();

                if (!$already) {
                    $user->notify(new PackageExpiringSoon($user->package_expires_at, $daysLeft));
                }
            }
        }

        if ($user->user_type === 'owner') {
            // Only owner’s properties/units
            $totalProperties = Property::where('owner_id', $user->id)->count();
            $totalUnits      = Unit::whereIn('property_id', 
                                Property::where('owner_id', $user->id)->pluck('id')
                              )->count();
        }

        if ($user->user_type === 'tenant') {
            // Only tenant’s unit
            $totalProperties = 0;
            $totalUnits      = Unit::where('tenant_id', $user->id)->count();
        }

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalUnits',
            'totalInvoice',
            'totalExpense',
            'packages',
            'showPackages',
            'daysLeft',
            'user'
        ));
    }

    public function choosePackage(Package $package)
    {
        $user = auth()->user();

        // Only admin can choose package
        if ($user->user_type !== 'admin') {
            abort(403, 'Unauthorized action');
        }

        $now   = Carbon::now();
        $interval = strtolower($package->interval ?? 'month');   
        $count    = (int) ($package->interval_count ?? 1);
        $trial    = (int) ($package->trial_days ?? 0);

        $packageStartedAt = $now->copy();

        if ($trial > 0) {
            $firstExpiry = $packageStartedAt->copy()->addDays($trial);
        } else {
            $firstExpiry = match ($interval) {
                'day'   => $packageStartedAt->copy()->addDays($count),
                'week'  => $packageStartedAt->copy()->addWeeks($count),
                'year'  => $packageStartedAt->copy()->addYears($count),
                default => $packageStartedAt->copy()->addMonthsNoOverflow($count),
            };
        }

        $packageRenewsAt  = $firstExpiry->copy();
        $packageExpiresAt = $firstExpiry->copy();

        $user->update([
            'package_id'         => $package->id,
            'package_started_at' => $packageStartedAt,
            'package_renews_at'  => $packageRenewsAt,
            'package_expires_at' => $packageExpiresAt,
        ]);

        return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
    }
}
