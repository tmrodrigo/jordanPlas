<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Category;
use App\Client;
use App\Product;
use App\ProductAtribute;
use PDF;

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

  public function show_form(Request $request){
    
    $categories = Category::orderBy('name')->get();

    $products = $categories->first()->product;
    $s_product = '';
    $colors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $products[0]->id)->select('value')->get();
    $s_color = '';
    $measure = '';
    $support = '';
    $amount = '';
    $unit_price = '';
    $selected_category = '';
    $observations = '';
    $delivery_date = '';
    $payment = '';
    $sub_category_name = '';

    $client_data = $request->session()->get('client_data');
    if (!isset($client_data)) {
      $client_data = [];
    }

    $session = $request->session()->get('data');

    $selected_products = $request->session()->get('selected_products');

    if (!isset($selected_products)) {
      $selected_products = [];
    }

    if (isset($session['category'])) {
      $selected_category = $session['category'];
    }

    if (isset($session['products'])) {
      $products = $session['products'];
    }

    if (isset($session['s_product'])) {
      $s_product = $session['s_product'];
    }

    if (isset($session['colors'])) {
      $colors = $session['colors'];
    }

    if (isset($session['s_color'])) {
      $s_color = $session['s_color'];
    }

    if (isset($session['amount'])) {
      $amount = $session['amount'];
    }

    if (isset($session['unit_price'])) {
      $unit_price = $session['unit_price'];
    }

    if (isset($session['measure'])) {
      $measure = $session['measure'];
    }

    if (isset($session['support'])) {
      $support = $session['support'];
    }

    if (isset($session['observations'])) {
      $observations = $session['observations'];
    }

    if (isset($session['delivery_date'])) {
      $delivery_date = $session['delivery_date'];
    }

    if (isset($session['payment'])) {
      $payment = $session['payment'];
    }

    if (isset($session['sub_category_name'])) {
      $sub_category_name = $session['sub_category_name'];
    }    

    $total = '';
    if (isset($selected_products)) {
      $total = arrSum($selected_products, 'sub_total');
    }

    $iva = '';
    if (isset($client_data['tax']) && $client_data['tax'] == true) {
      $iva = $total * 0.21;
      $total = $total + $iva;
    }

    return view('backend.budget.form', [
      'categories' => $categories,
      'products' => $products,
      's_product' => $s_product,
      's_color' => $s_color,
      'colors' => $colors,
      'amount' => $amount,
      'measure' => $measure,
      'support' => $support,
      'unit_price' => $unit_price,
      'selected_category' => $selected_category,
      'selected_products' => $selected_products,
      'client_data' => $client_data,
      'total' => $total,
      'iva' => $iva,
      'observations' => $observations,
      'delivery_date' => $delivery_date,
      'payment' => $payment,
      'sub_category_name' => $sub_category_name,
    ]);

  }

  public function get_budget_info(Request $request){
    
    $products = Product::where('category_id', $request->category_id)->orderBy('name')->get();
    $bColors = [];

    if (isset($request->product_id)) {

      $product = Product::where('id', $request->product_id)
                  ->with('category')
                  ->select('id', 'units')
                  ->first();

      $bColors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $request->product_id)->select('value')->get();
      $bColors = add_bi_color($bColors);
    }

    $data = [
      'category' => $request->category_id,
      'products' => $products,
      'colors' => $bColors,
      's_color' => $request->color,
      's_product' => $request->product_id,
      'amount' => $request->amount,
      'measure' => $request->measure,
      'support' => $request->support,
      'unit_price' => $request->unit_price,
    ];

    $request->session()->put('data', $data);

    if (isset($request->product_id) && isset($request->amount) && isset($request->unit_price) ) {

      $product = Product::where('id', $request->product_id)
                        ->with('category', 'sub_category')
                        ->select('id', 'name', 'category_id', 'avatar', 'description', 'sub_category_id')
                        ->first();

      $m = 'Metro lineal';
      if ($request->amount > 1) {
        $m = 'Metros lineales';
      }

      if ($request->measure == false) {
        $m = 'Unidad';
        if ($request->amount > 1) {
          $m = 'Unidades';
        }
      }

      $s = 'Fijación mecánica';
      if ($request->support === false) {
        $s = 'Pegamento';
      }

      if ($request->support === 'na') {
        $s = 'No incluida';
      }

      $sub_category_name = '';
      if ($product->sub_category != null) {
        $sub_category_name = $product->sub_category->name;
      }

      $sp = [
        'id' => $product->id,
        'name' => $product->name,
        'category_id'  => $product->category_id,
        'category_name' => $product->category->name,
        'sub_category_name' => $sub_category_name,
        'color' => $request->color,
        'avatar' => $product->avatar,
        'description' => $product->description,
        'unit_price' => (int)$request->unit_price,
        'measure' => $m,
        'support' => $s,
        'amount' => (int)$request->amount,
        'sub_total' => $request->amount * $request->unit_price
      ];

      $selected_products = $request->session()->get('selected_products');

      if (!isset($selected_products)) {
        $selected_products = [];
      }

      $selected_products[] = $sp;

      $request->session()->put('selected_products', $selected_products);

      $data = [];
      $request->session()->put('data', $data);

    }

    return redirect()->route('budget');

  }

  public function add_client_info(Request $request){

    $data = $request->all();
    $data['cuit'] = cuit($request->cuit);

    $request->session()->put('client_data', $data);

    return redirect()->route('budget');
  }

  public function remove_item(Request $request, $key){

    $p = $request->session()->get('selected_products');

    unset($p[$key]);

    $request->session()->put('selected_products', $p);

    return redirect()->route('budget');

  }

  public function create_budget(Request $request){

    $client_info = $request->session()->get('client_data');

    if (!isset($client_info) || isset($client_info['budget_info'])) {
      return redirect()->back()->withErrors('Falta el nombre del cliente o la fecha de presupuesto');
    }

    unset($client_info['_token']);
    unset($client_info['tax']);
    unset($client_info['delivery']);
    unset($client_info['observations']);
    unset($client_info['delivery_date']);
    unset($client_info['payment']);
    unset($client_info['budget_date']);
    $client_info['cuit'] = null;

    if (isset($client_info['cuit'])) {
      $client_info['cuit'] = str_replace('-', '', $client_info['cuit']);
    }

    $client = Client::create($client_info);

    $budget_data = $request->session()->get('client_data');
    $products = $request->session()->get('selected_products');

    $tax = 0;
    $total = arrSum($products, 'sub_total');
    if (isset($budget_data['tax']) && $budget_data['tax'] == true) {
      $tax = $total * 0.21;
      $total = $total + $tax;
    }

    $budget = Budget::create([
      'has_tax' => $budget_data['tax'],
      'has_delivery' => $budget_data['delivery'],
      'observation' => $budget_data['observations'],
      'delivery_date' => $budget_data['delivery_date'],
      'payment' => $budget_data['payment'],
      "client_id" => $client->id,
      "tax" => $tax,
      "total" => $total,
      'budget_date' => $budget_data['budget_date'],
    ]);

    foreach ($products as $product) {
      $budget->products()->attach($product['id'], ['amount' => $product['amount'], 'unit_price' => $product['unit_price'], 'color' => $product['color'], 'unit' => $product['measure'], 'support' => $product['support']]);
    }

    $products = $budget->products;

    $data = [
      'client' => $client, 
      'products' => $products,
      'budget' => $budget
    ];

    $pdf = PDF::loadView('backend.budget.pdf', $data);
    
    $name = 'JordanPlas-Presupuesto_N-' . $budget->id . '.pdf';

    return $pdf
          // ->stream($name);
          ->download($name);

  }

  public function show_pdf(){

    $client = Client::orderBy('created_at', 'DESC')->first();

    $products = $client->budget->products;
    $budget = $client->budget;

    return view('backend.budget.pdf', [
      'client' => $client,
      'products' => $products,
      'budget' => $budget,
    ]);

  }
}
