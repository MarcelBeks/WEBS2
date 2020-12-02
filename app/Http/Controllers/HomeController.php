<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getAllProducts();

        return view('category.products', compact('products'));
    }

    public function about()
    {
        return view('home.about');
    }
}
