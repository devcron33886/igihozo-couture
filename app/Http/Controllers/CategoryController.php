<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __invoke($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $query = $category->products();

        if (request('sort', '') == 'popular') {
            $query->orderBy('stock', 'desc');
        } else {
            $query->latest('id');
        }

        $products = $query->paginate(12);

        return view('categories.show', compact('category','products'));
    }
}
