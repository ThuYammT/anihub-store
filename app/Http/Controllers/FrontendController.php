<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function welcome(){
        $categories = Category::all();
        $products = Product::all();
        $offerProducts = Product::inRandomOrder()->take(2)->get(); // Get 2 random products for offers
        
        return view('welcome', compact('categories', 'products', 'offerProducts'));
    }
}