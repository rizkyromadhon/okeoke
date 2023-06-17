<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $allproducts = Product::where('quantity', '>=', 0)->get();
        $productempty = Product::where('quantity', 0)->get();
        return view('home', compact('allproducts', 'productempty'), [
            "title" => 'Home Page',
        ]);
    }
}
