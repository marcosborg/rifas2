<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Company;
use App\Models\Product;

class MarketplaceController extends Controller
{
    public function index()
    {

        $product_categories = ProductCategory::all();
        $companies = Company::all();
        $products = Product::all();

        return view('website.marketplace.index', compact('product_categories', 'companies', 'products'));
    }

    public function registerSalesman()
    {
        return view('website.marketplace.register');
    }
}
