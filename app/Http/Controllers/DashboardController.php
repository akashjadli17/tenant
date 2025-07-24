<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_active', 1)->get();

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


}