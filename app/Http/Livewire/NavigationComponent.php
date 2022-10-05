<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class NavigationComponent extends Component
{
    protected $listeners= [
        'cart.updated' => '$refresh'
    ];
    public function render(): Factory|View|Application
    {
        $totalItems=Cart::getTotalQuantity();
        $categories = Category::all();

        return view('livewire.navigation-component', compact('categories','totalItems'));
    }
}
