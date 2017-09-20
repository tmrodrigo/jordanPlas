<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Product;
use App\Image;


class ProjectController extends Controller
{
  public function index()
  {
    $products = Product::all();
    $categories = Category::all();
    $projects = Project::all();
    $images = Image::all();
    return view('projects', [
        'projects' => $projects,
        'categories' => $categories,
        'products' => $products,
        'images' => $images
    ]);
  }
}
