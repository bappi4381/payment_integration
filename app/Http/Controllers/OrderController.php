<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('product.order', compact('product')); // Passing product data to the view
    }
}
