<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('checkout', ['cart' => session()->get('cart')]);
    }

    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if (array_key_exists($product->id, $cart['products'])) {
                $cart['total_price']                           += $product->price;
                $cart['total_qtty']                            += 1;
                $cart['products'][$product->id]->cart_quantity += 1;
                session(['cart' => $cart]);
            } else {
                $product->cart_quantity         = 1;
                $cart['total_price']            += $product->price;
                $cart['total_qtty']             += 1;
                $cart['products'][$product->id] = $product;
                session(['cart' => $cart]);
            }
        } else {
            $product->cart_quantity         = 1;
            $cart['products'][$product->id] = $product;
            $cart['total_price']            = $product->price;
            $cart['total_qtty']             = 1;
            session(['cart' => $cart]);
        }
    }

    public function removeFromCart(Product $product)
    {
        $cart                = session()->get('cart');
        $cart['total_price'] -= $product->price * $cart['products'][$product->id]->cart_quantity;
        $cart['total_qtty']  -= $cart['products'][$product->id]->cart_quantity;
        unset($cart['products'][$product->id]);
        session(['cart' => $cart]);
    }
}
