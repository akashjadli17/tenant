<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  // app/Http/Controllers/AdminDashboardController.php

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
        $user->package_id = $package->id;
        $user->package_expires_at = now()->addMonths($package->duration_months);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Package applied successfully.');
    }


}