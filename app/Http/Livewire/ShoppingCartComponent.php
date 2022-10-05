<?php

namespace App\Http\Livewire;

use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public function render(): Factory|View|Application
    {
        $cart=Cart::getContent();
        return view('livewire.shopping-cart-component',compact('cart'));
    }


    public  function removeAll()
    {
        Cart::clear();

        $this->emit('productRemoved');
    }


}
