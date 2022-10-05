<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        /* if (is_null($product) || $product->status !== 'Available') {
            return redirect()->back();
        } */

        $qty = $request->input('qty');
        if (! $qty) {
            $qty = 1;
        }

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $qty,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        return redirect()->back();
    }

    public function getIncrement(Request $request, $id)
    {
        $qty = $request->input('qty');
        if (! $qty) {
            $qty = 1;
        }

        $product = Product::findOrFail($id);
        Cart::remove($id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $qty,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        return redirect()->route('cart.index');
    }

    public function getDecrement($id)
    {
        // you may also want to update a product by reducing its quantity, you do this like so:
        Cart::update($id, [
            'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ]);

        return redirect()->route('cart.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function getRemoveItem($id)
    {
        Cart::remove($id);

        return redirect()->route('cart.index');
    }

    public function getRemoveAll()
    {
        Cart::clear();

        return redirect()->route('cart.index');
    }
}
