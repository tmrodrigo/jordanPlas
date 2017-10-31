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
        // $products = Product::where('rating', '>', '3')->get();
        $products = Product::all();

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
        $images = Project::take(4)->get();
        $projects = Project::all();
        $products = Product::orderBy('rating', 'desc')->get();
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
            'services' => $services,
            'images' => $images

        ]);
    }

}
