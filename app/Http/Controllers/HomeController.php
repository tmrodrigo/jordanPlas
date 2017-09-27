<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use App\Category;
use App\Project;
use App\Client;
use App\ClientLogo;
use App\Certificate;
use App\Company;
use App\Service;

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
            'certificates' => $certificates
        ]);
    }

    public function home()
    {
        $posts = Post::all();
        $categories = Category::all();
        $projects = Project::all();
        $products = Product::where('rating', '>', '3')->get();
        $data = Company::orderBy('created_at', 'desc')->first();
        $logos = ClientLogo::all();
        $certificates = Certificate::all();
        $services = Service::all();
        return view('home', [
            'posts' => $posts,
            'categories' => $categories,
            'projects' => $projects,
            'products' => $products,
            'data' => $data,
            'logos' => $logos,
            'certificates' => $certificates,
            'services' => $services

        ]);
    }

}
