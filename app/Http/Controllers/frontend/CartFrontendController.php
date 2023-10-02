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

        $hargaTotal = 0;
        foreach ($cartItems as $item) {
            $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
            $hargaTotal += $hargaFinal * $item->quantity;
        }
        // session()->put('cartItems', $cartItems);
        // session()->put('hargaTotal', $hargaTotal);
        return view('frontend.cart',
            [
                'cartItems' => $cartItems,
                'hargaTotal' => $hargaTotal
            ]
        );
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
            return response()->json(['error' => 'Produk tidak di temukan'], 404);
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

        return response()->json(['message' => 'Item berhasil masuk keranjang'], 200);
    }

    public function addToFormCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Get the authenticated customer
        $customer = auth()->guard('customer')->user();

        // Find the product by its ID
        $product = Produk::find($productId);

        if (!$product) {
            return redirect()->back()
                ->with('error', 'Produk tidak di temukan')
                ->withInput(); // Jika Anda ingin mengembalikan input yang telah dimasukkan oleh pengguna
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

        return redirect()->route('cart.shopping_cart')->with('success', 'Berhasil menambah item ke keranjang.');
    }

    public function updateCart(Request $request)
    {
        $cartData = $request->input('quantity');

        foreach ($cartData as $itemId => $quantity) {
            // Ensure that $quantity is a positive integer or handle validation as needed
            $quantity = max(1, intval($quantity));

            // Update the cart item quantity based on $itemId
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        // Redirect back to the cart page or wherever you want after updating quantities
        return redirect()->route('cart.shopping_cart')->with('success', 'Keranjang Berhasil di Update!');
    }

    public function removeFromCart($cartItem)
    {
        // Find the Cart item by ID and delete it
        $cartItem = Cart::find($cartItem);
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item Berhasil di hapus dari keranjang'], 200);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }
}
