<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCardController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('card.card', compact('products'));
    }
}
