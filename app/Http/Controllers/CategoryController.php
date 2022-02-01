<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Certificate;
use App\Product;
use App\Project;
use App\Service;

class CategoryController extends Controller
{
  public function show($category, $id)
  {
    $categories = Category::orderBy('name')->get();
    $category = Category::find($id);
    $products = Product::where('category_id', '=', $id)
                        ->orderBy('rating', 'asc')
                        ->orderBy('updated_at', 'desc')
                        ->get();
    $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();

    return view('products', [
        'categories' => $categories,
        'category' => $category,
        'products' => $products,
        'certificates' => $certificates,
        'id' => $id,
    ]);
  }

  public function index()
  {
    $categories = Category::all()->sortBy('name');
    $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();
    $topProducts = Product::where('rating', '<', '3')->get();
    $projects = Project::all();
    $services = Service::all();

    return view('productsList', [
        'categories' => $categories,
        'certificates' => $certificates,
        'projects' => $projects,
        'services' => $services,
        'topProducts' => $topProducts
    ]);
  }

  public function store(Request $request, Category $category)
  {
    $this->validate($request, [
      'name' => 'required|string',
			'avatar'=> 'required'
    ], [
      'name.required' => 'Nombre de categoría requerido',
      'name.string' => 'El nombre no puede ser un número',
      'avatar.required' => 'La categoría debe tener una imagen como avatar',
    ]);

    $category = new Category;
    $category->name = $request['name'];
    $category->description = $request['description'];

    $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($request['name']));
    $certImg = $request->file("avatar");
    $name = $imgName . "-avatar" . "." . $certImg->extension();
    $folder = "category-avatar";
    $path = $certImg->storePubliclyAs($folder, $name);
    $category->avatar = $path;


    $category->save();

    return redirect()->back()->with('message', 'Nueva categoría guardada');
  }

  public function update(Request $request, Category $category)
  {

    $this->validate($request, [
      'name' => 'required|string',
    ], [
      'name.required' => 'Nombre de categoría requerido',
      'name.string' => 'El nombre no puede ser un número'
    ]);

    $category = Category::find($request['id']);

    $category->name = $request['name'];
    $category->description = $request['description'];
    if (isset($request['avatar'])) {
      $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($request['name']));
      $certImg = $request->file("avatar");
      $name = $imgName . "-avatar" . "." . $certImg->extension();
      $folder = "category-avatar";
      $path = $certImg->storePubliclyAs($folder, $name);
      $category->avatar = $path;
    }

    $category->update();

    return redirect()->back()->with('message', 'Categoría editada con éxito');
  }

  public function destroy(Request $request, Category $category)
  {
    // dd($request);
    $category = Category::find($request['id']);
    $category->delete();
    return redirect()->back()->with('message', 'Categoría eliminada');
  }
}
