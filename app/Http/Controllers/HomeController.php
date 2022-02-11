<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use App\Client;
use App\Certificate;
use App\Image;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = Category::orderBy('name')->get();
        $images = Image::take(3)->where('category_id', '=', 'company')->orderBy('created_at', 'desc')->get();

        return view('home', [
            'categories' => $categories,
            'images' => $images
        ]);
    }

    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::get()->sortBy('name');
        $sub_categories = SubCategory::get()->sortBy('name');
        $clients = Client::orderBy('created_at', 'desc')->limit('5')->get();
        $certificates = Certificate::all();

        return view('backend/backendHome', [
            'products' => $products,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'clients' => $clients,
            'certificates' => $certificates
        ]);
    }

}
