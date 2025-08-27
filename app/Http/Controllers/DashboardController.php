<?php

namespace App\Http\Controllers;
use App\Notifications\PackageExpiringSoon;
use App\Models\Package;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $totalProperties = Property::count();
        $totalUnits      = Unit::count();
        $totalInvoice    = 0;  
        $totalExpense    = 0;  

        $user         = Auth::user();
        $showPackages = $user->shouldSeePackageChooser(10);
        $daysLeft     = $user->daysUntilPackageExpires();

        $packages = $showPackages
            ? Package::where('status', 1)->orderBy('price')->get()
            : collect();

        if (!is_null($daysLeft) && $daysLeft > 0 && $daysLeft <= 10) {
            $already = $user->notifications()
                ->where('type', PackageExpiringSoon::class)
                ->whereJsonContains('data->expires_at', optional($user->package_expires_at)->toDateString())
                ->exists();

            if (!$already) {
                $user->notify(new PackageExpiringSoon($user->package_expires_at, $daysLeft));
            }
        }

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalUnits',
            'totalInvoice',
            'totalExpense',
            'packages',
            'showPackages',
            'daysLeft'
        ));
    }

 
    public function choosePackage(Package $package)
    {
        $user  = auth()->user();
        $now   = Carbon::now();

        // cycle basics
        $interval = strtolower($package->interval ?? 'month');   
        $count    = (int) ($package->interval_count ?? 1);
        $trial    = (int) ($package->trial_days ?? 0);

        // start now
        $packageStartedAt = $now->copy();

        // if there is a trial, first “expiry/renewal” is after the trial period
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

        // we treat “expires_at” as the **end of the current billed period**,
        // even for auto-renew plans — so the dashboard can show days left.
        $packageRenewsAt  = $firstExpiry->copy();
        $packageExpiresAt = $firstExpiry->copy();

        // If you truly need a “final” expiry for fixed-term plans (no auto_renews + total_cycles),
        // you can uncomment this block to compute the final end date.
        /*
        if (!$package->auto_renews && $package->total_cycles) {
            $final = $trial > 0
                ? $packageStartedAt->copy()->addDays($trial)
                : $packageStartedAt->copy();

            for ($i = 0; $i < $package->total_cycles; $i++) {
                $final = match ($interval) {
                    'day'   => $final->addDays($count),
                    'week'  => $final->addWeeks($count),
                    'year'  => $final->addYears($count),
                    default => $final->addMonthsNoOverflow($count),
                };
            }
            $packageExpiresAt = $final;
        }
        */

        $user->update([
            'package_id'         => $package->id,
            'package_started_at' => $packageStartedAt,
            'package_renews_at'  => $packageRenewsAt,
            'package_expires_at' => $packageExpiresAt,
        ]);

        return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
    }
}
