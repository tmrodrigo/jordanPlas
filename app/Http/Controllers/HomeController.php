<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use App\Client;
use App\Certificate;
use App\Post;
use App\Company;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = Category::orderBy('id')->get();
        $images = Post::select('name as category_id', 'image as url' )->get();
        $company_data = Company::orderBy('created_at', 'DESC')->first();

        return view('home', [
            'categories' => $categories,
            'images' => $images,
            'company_data' => $company_data
        ]);

        // return view('welcome-old', []);


    }

    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::get()->sortBy('name');
        $sub_categories = SubCategory::get()->sortBy('name');
        $clients = Client::orderBy('created_at', 'desc')->limit('5')->get();
        $certificates = Certificate::all();
        $company_data = Company::orderBy('created_at', 'DESC')->first();

        return view('backend/backendHome', [
            'products' => $products,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'clients' => $clients,
            'certificates' => $certificates,
            'company_data' => $company_data
        ]);
    }

}
