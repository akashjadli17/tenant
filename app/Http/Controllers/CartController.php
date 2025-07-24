<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $userId = Auth::id();
        $sessionId = $request->session()->getId();

        $cart = Cart::where('service_id', $request->service_id)
                    ->where(function($q) use ($userId, $sessionId) {
                        if ($userId) {
                            $q->where('user_id', $userId);
                        } else {
                            $q->where('session_id', $sessionId);
                        }
                    })->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'session_id' => $userId ? null : $sessionId,
                'service_id' => $request->service_id,
                'quantity' => 1
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Added to cart']);
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $sessionId = $request->session()->getId();

        $carts = Cart::with('service')
            ->where(function($q) use ($userId, $sessionId) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('session_id', $sessionId);
                }
            })
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function remove($id)
    {
        Cart::where('id', $id)->where(function($q) {
            if (Auth::check()) {
                $q->where('user_id', Auth::id());
            } else {
                $q->where('session_id', session()->getId());
            }
        })->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed');
    }

}
