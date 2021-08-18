<?php

namespace App\Http\Controllers;

use Cart;
use App\Size;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        session()->put('after_login_url', url('/checkout'));
        Cart::setGlobalTax(0);
    }

    public function index()
    {
        $contents = Cart::content();
        return view('pages.cart', compact('contents'));
    }


    public function remove(Request $request)
    {
        Cart::remove($request->item);
        if ($request->ajax()) {
            return response()->json(['message_type' => 'success', 'message' => 'Item has been removed from cart']);
        }
        return back()->with('success', 'Item has been removed from cart');
    }

    public function store(Request $request)
    {
        $product = Product::where('slug', '=', $request->input('product'))->firstOrFail();
        if ($product && $product->stock > 0) {

            $size = $request->has('size') ? $request->input('size') : '';
            $qty = $request->has('qty') ? $request->input('qty') : 1;
            $width = $request->has('width') ? $request->input('width') : 0;
            $price = $request->has('price') ? $request->input('price') : 0;

            $cart = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'weight' => $width,
                'options' => ['size' => $size, 'delivery_charges' => 0],
            ]);
            Cart::associate($cart->rowId, 'App\Product');
            $message = '<a href="/' . $product->slug . '">' . ucwords($product->name) . '</a> has been added to cart';
            return response()->json(['message_type' => 'success', 'message' => $message]);
        }
        return response()->json(['message_type' => 'error', 'message' => 'Oops! Sorry Product is Out of stock']);
    }

    public function update(Request $request)
    {
        $row_id = $request->input('itemId');
        $qty = $request->input('qty');
        $size = $request->input('size');
        Cart::update($row_id, $qty);
        Cart::update($row_id, ['options' => ['size' => $size, 'delivery_charges' => 0]]);
        return back()->with('success', 'Cart has been updated');
    }

    public function top_cart(Request $request)
    {
        $view = view('partials.top_cart')->render();
        return response()->json(['html' => $view]);
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect('/cart');
    }
}
