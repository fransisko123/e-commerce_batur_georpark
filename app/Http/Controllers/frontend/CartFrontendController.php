<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartFrontendController extends Controller
{

    public function shopping_cart()
    {
        // Get the currently authenticated customer
        $customer = Auth::guard('customer')->user();

        // Retrieve all cart items for the authenticated customer
        $cartItems = Cart::where('customer_id', $customer->id)->get();

        return view('frontend.cart', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        // Get the authenticated customer
        $customer = auth()->guard('customer')->user();

        // Find the product by its ID
        $product = Produk::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Check if the product is already in the cart for this customer
        $existingCartItem = Cart::where('customer_id', $customer->id)
            ->where('produk_id', $product->id)
            ->first();

        if ($existingCartItem) {
            // If the product is already in the cart, update the quantity
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
        } else {
            // If not, create a new cart item
            Cart::create([
                'customer_id' => $customer->id,
                'produk_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart'], 200);
    }

    public function updateCart()
    {
        dd('hello');
    }
}
