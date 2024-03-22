<?php

namespace App\Http\Controllers\Client;

use App\Models\Product_cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function addToCartFromViewPage(Request $request, $product_id)
    {
        $user_id = auth()->user()->id;
        $product_cart = Product_cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
        if ($product_cart) {
            $product_cart->quantity += $request->input('quantity');
            $product_cart->color_code = $request->input('color_code');
            $product_cart->size_value = $request->input('size_value');
            if ($product_cart->save()) {
                return response()->json(['success' => true, 'message' => 'Cart added successfully :)']);
            }
        } else {
            $product_cart = new Product_cart();
            $product_cart->user_id = $user_id;
            $product_cart->product_id = $product_id;
            $product_cart->quantity = $request->input('quantity');
            $product_cart->color_code = $request->input('color_code');
            $product_cart->size_value = $request->input('size_value');
            if ($product_cart->save()) {
                return response()->json(['success' => true, 'message' => 'Cart added successfully :)']);
            }
        }
    }
    public function addToCart($product_id)
    {

        $user_id = auth()->user()->id;
        $product_cart = Product_cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
        if ($product_cart) {
            $product_cart->quantity += 1;
            if ($product_cart->save()) {
                return response()->json(['success' => true, 'message' => 'Cart added successfully :)']);
            }
        } else {
            $product_cart = new Product_cart();
            $product_cart->user_id = $user_id;
            $product_cart->product_id = $product_id;
            $product_cart->quantity = 1;
            if ($product_cart->save()) {
                return response()->json(['success' => true, 'message' => 'Cart added successfully :)']);
            }
        }
    }

    public function removeFromCart($product_cart_id)
    {

        // Get the currently authenticated user

        // Find the cart entry for the given product and user
        $cartEntry = Product_cart::whereId($product_cart_id)
            ->first();

        if ($cartEntry) {
            // Remove the cart entry (delete it from the database)
            $cartEntry->delete();

            return response()->json(['success' => true, 'message' => 'Cart removed successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in the cart.']);
    }

}
