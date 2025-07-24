<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Enquiry;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalServices = Service::count();

        // Use actual model if these tables exist, else keep it as 0
        $totalCustomers = 0; // or Customer::count();
        $totalEnquiries = 0; // or Enquiry::count();

        return view('admin.dashboard', compact('totalServices', 'totalCustomers', 'totalEnquiries'));
    }
}
