<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use App\Category;
use App\Project;
use App\Client;
use App\Certificate;
use App\Company;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('rating', '>', '3')->get();
        $categories = Category::all();
        $clients = Client::orderBy('created_at', 'desc')->limit('5')->get();
        $certificates = Certificate::all();
        return view('backend/backendHome', [
            'products' => $products,
            'categories' => $categories,
            'clients' => $clients,
            'certificates' => $certificates,
        ]);
    }

    public function home()
    {
        $posts = Post::all();
        $categories = Category::all();
        $projects = Project::all();
        $products = Product::where('rating', '>', '3')->get();
        $clientId = Client::orderby('updated_at', 'desc')->first();
        $data = Company::orderBy('created_at', 'desc')->first();
        return view('home', [
            'posts' => $posts,
            'categories' => $categories,
            'projects' => $projects,
            'products' => $products,
            'clientId' => $clientId,
            'data' => $data
        ]);
    }

}
