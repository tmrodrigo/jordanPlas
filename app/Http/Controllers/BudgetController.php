<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Client;
use App\Product;

class BudgetController extends Controller
{
  public function create()
  {
    $categories = Category::all();
    return view('products.productsCreate', [
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
      // $this->validate(request(), [
      //
      // ]);

      // to do ajustar para guardar nuevo presupuesto

      $product = new Product();
          $product->name = $request['name'];
          $product->description = $request['description'];
          $product->category_id = $request['category_id'];
          // Necesito el archivo en una variable esta vez
          $file = $request->file("avatar");
          // Armo un nombre único para este archivo
          $name = $product->name . "." . $file->extension();
          $folder = "products";
          $path = $file->storePubliclyAs($folder, $name);
          // var_dump($path); die();
          $product->avatar = $path;

      $product->save();
      return redirect('products');
  }

  public function show($id)
  {
    $bProducts = Budget::where('client_id', '=', $id)->get();
    $products = Product::all();
    $client = Client::find($id);
    return view('backend.messages.budget', [
      'bProducts' => $bProducts,
      'client' => $client,
      'products' => $products
    ]);
  }
}
