<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;

class CartItemComponent extends Component
{
    public $product;

    public $cartItem;

    public $quantity;

    public function mount(Product $product, $cartItem)
    {
        $this->quantity = $cartItem->quantity;
    }

    public function render()
    {
        return view('livewire.cart-item-component', [
            'product' => $this->product,
            'cartItem' => $this->cartItem,
        ]);
    }

    public function update()
    {
        $this->skipRender();

        $product = $this->product;
        $quantity = $this->quantity;
        /* if ($product->status !== 'Available' || $quantity <= 0) {
            session()->flash('error', 'Product not available');
        } */

        $id = $product->id;
        Cart::remove($id);

        $cartItem = Cart::add([
            'id' => $id,
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        $this->emit('productAdded');
        session()->flash('success', $product->name.' Successfully added to cart');
    }

    public function remove()
    {
        $this->skipRender();

        $product = $this->product;
        Cart::remove($product->id);
        $this->emit('productRemoved');

        session()->flash('success', $product->name.' Successfully removed to cart');
    }
}
