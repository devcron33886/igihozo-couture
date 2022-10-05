<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        //do something
    }
}
