<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function confirm(Request $request)
    {
        // Validate
        $request->validate([
            'booking_date' => 'required|date',
            'booking_time' => 'required',
        ]);

        // You can store the appointment info here
        // Loop through cart and create appointment records if needed

        return redirect()->route('cart.index')->with('success', 'Booking confirmed successfully!');
    }


}