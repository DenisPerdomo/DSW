<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
        if (!\Session::has('cart')) {
            \Session::put('cart', array());
        }
    }
    //Show cart
    public function show()
    {
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('cart.cart', compact('cart', 'total'));
    }
    //Add item cart
    public function add(Product $product)
    {
        $cart = \Session::get('cart');
        $product->quantityCart = 1;
        $cart[$product->id] = $product;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }
    //Delete item
    public function delete(Product $product)
    {
        $cart = \Session::get('cart');
        unset($cart[$product->id]);
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }
    //Update item
    public function update(Request $request, Product $product)
    {
        $quantity = $request->cartQuantity;
        $cart = \Session::get('cart');
        $cart[$product->id]->quantityCart = $quantity;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }
    //Trash cart
    public function trash()
    {
        \Session::forget('cart');

        return redirect()->route('cart-show');
    }
    //Total
    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->price * $item->quantityCart;
        }
        return $total;
    }
}
