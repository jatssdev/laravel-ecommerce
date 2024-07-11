<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $carts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.*', 'carts.quantity')
                ->where('carts.user_id', $id)
                ->get();
            $total = $carts->sum(function ($cart) {
                return ($cart->price / 100) * (100 - $cart->discount);
            });
            return view('cart', compact('carts', 'total'));
        } else {
            return redirect()->route('user.login')->with('error', 'You Are Not Logged In!');
        }



    }


    function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'you have to first login to add product in cart');
        }

        $user = Auth::user();
        $existing = cart::where('product_id', $request->product_id)->where('user_id', $user->id);
        if ($existing->count() > 0) {
            return redirect()->back()->with('error', 'this product is already in your cart!');
        }

        $cart = cart::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        $cart->save();

        return redirect()->back()->with('success', 'item added to cart');

    }
}
