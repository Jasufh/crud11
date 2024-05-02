<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all()->where('user_id', Auth::user()->id);

        return view('product.cart-shop.index', compact('carts'));
    }

    public function store(Request $request, string $id)
    {
        $request->validate([
            'cantidad' => 'required', 
        ]);

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id; 
        $cart->cantidad = $request->cantidad;
        
        $cart->save();

        toast('Producto Agregado al Carrito!!', 'success');

        return redirect()->back();
    }
}
