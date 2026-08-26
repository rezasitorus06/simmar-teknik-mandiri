<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        try {
            $products = Product::latest()->get();
        } catch (QueryException) {
            $products = collect();
        }

        return view('home', [
            'featuredProducts' => $products->where('is_featured', true)->take(3),
            'products' => $products,
        ]);
    }
}
