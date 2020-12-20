<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart.index');
    }

    public function checkout(){
        return view('pages.cart.checkout');
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'qty' => 'required'
        ]);

        $product_id = $request->code;
        $qty = $request->qty;
        $product = Product::find($product_id);
        Cart::add($product->id_product, $product->name, $qty, $product->price, ['image' => $product->image]);
        return view('components.cart-added-message');
    }

    public function updateToCart(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'qty' => 'required'
        ]);

        Cart::update($request->code, $request->qty);
        return response()->json(['status' => 'success', 'message' => 'Se actualizo correctamente']);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        Cart::remove($request->code);
        return response()->json(['status' => 'success', 'message' => 'Se eliminó correctamente']);
    }
}
