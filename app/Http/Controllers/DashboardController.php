<?php
<<<<<<< HEAD

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

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
            ? Package::where('status', 'active')->get()
            : collect();

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
    $user = auth()->user();

    $startsAt = now();
    if ($package->trial_days) {
        $startsAt = $startsAt->copy()->addDays($package->trial_days);
    }

    $nextRenewal = match ($package->interval) {
        'day'   => $startsAt->copy()->addDays($package->interval_count),
        'week'  => $startsAt->copy()->addWeeks($package->interval_count),
        'month' => $startsAt->copy()->addMonthsNoOverflow($package->interval_count),
        'year'  => $startsAt->copy()->addYears($package->interval_count),
        default => $startsAt->copy()->addMonth(),
    };

    $user->package_id         = $package->id;
    $user->package_started_at = now();
    $user->package_renews_at  = $nextRenewal; // for auto‑renewing subs

    if (!$package->auto_renews && $package->total_cycles) {
        // compute final expiry for fixed‑term plans
        $expiry = $startsAt->copy();
        for ($i = 0; $i < $package->total_cycles; $i++) {
            $expiry = match ($package->interval) {
                'day'   => $expiry->addDays($package->interval_count),
                'week'  => $expiry->addWeeks($package->interval_count),
                'month' => $expiry->addMonthsNoOverflow($package->interval_count),
                'year'  => $expiry->addYears($package->interval_count),
            };
        }
        $user->package_expires_at = $expiry;
    } else {
        $user->package_expires_at = null; // sub stays active while renewing
    }

    $user->save();

    return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
}


=======
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
{
    // Fetch only active packages
    $packages = Package::where('status', 'active')->get();

    if (Auth::user()->role === 'admin') {
        return redirect()->intended(route('admin.dashboard'));
    }
        
    return view('dashboard', compact('packages'));
}


    public function choosePackage(Package $package)
    {
        $user = auth()->user();
        $user->package_id = $package->id;
        $user->package_expires_at = now()->addMonths($package->duration_months);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
    }


>>>>>>> 5020873c18cec238c14327fd31a614a8599b6212
}