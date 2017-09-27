<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Certificate;
use App\Product;

class CategoryController extends Controller
{
  public function show($id)
  {
    $categories = Category::all();
    $category = Category::find($id);
    $products = Product::where('category_id', '=', $id)->get();
    $certificates = Certificate::all();
    return view('products', [
        'categories' => $categories,
        'category' => $category,
        'products' => $products,
        'certificates' => $certificates
    ]);
  }

  public function index()
  {
    $categories = Category::all();
    return view('productsList', [
        'categories' => $categories
    ]);
  }

  public function store(Request $request, Category $category)
  {
    $this->validate($request, [
      'name' => 'required|string',
    ], [
      'name.required' => 'Nombre de categoría requerido',
      'name.string' => 'El nombre no puede ser un número'
    ]);
    $category = new Category;
    $category->name = $request['name'];
    $category->description = $request['description'];
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
