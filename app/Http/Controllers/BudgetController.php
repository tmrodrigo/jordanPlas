<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    
    $session = $request->session()->get('data');

    $selected_products = $request->session()->get('selected_products');

    $selected_category = $categories[0]->id;
    if (isset($session['category'])) {
      $selected_category = $session['category'];
    }

    $s_product = $products[0]->id;
    if (isset($session['s_product'])) {
      $s_product = $session['s_product'];
    }

    $colors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $products[0]->id)->select('value')->get();
    $colors = add_bi_color($colors);
    if (isset($session['colors'])) {
      $colors = $session['colors'];
    }

    $s_color = $colors[0]['value'];
    if (isset($session['s_color'])) {
      $s_color = $session['s_color'];
    }

    if (isset($session['products'])) {
      $products = $session['products'];
    }

    $client_data = $request->session()->get('client_data');
    if (!isset($client_data)) {
      $client_data = [];
    }

    if (!isset($selected_products)) {
      $selected_products = [];
    }

    $amount = '';
    if (isset($session['amount'])) {
      $amount = $session['amount'];
    }

    $unit_price = '';
    if (isset($session['unit_price'])) {
      $unit_price = $session['unit_price'];
    }

    $measure = '';
    if (isset($session['measure'])) {
      $measure = $session['measure'];
    }

    $support = '';
    if (isset($session['support'])) {
      $support = $session['support'];
    }

    $observations = '';
    if (isset($session['observations'])) {
      $observations = $session['observations'];
    }

    $delivery_date = '';
    if (isset($session['delivery_date'])) {
      $delivery_date = $session['delivery_date'];
    }

    $payment = '';
    if (isset($session['payment'])) {
      $payment = $session['payment'];
    }

    $sub_category_name = '';
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
    
    // Cambia la categoría
    $products = Product::where('category_id', $request->category_id)->orderBy('name')->get();
    $product = $products[0];

    $session = $request->session()->get('data');

    if (!empty($session)) {
    
      //Cambia el producto
      if (($request->category_id == $session['category']) && ($session['s_product'] != $request->product_id)) {
        
        $product = Product::where('id', $request->product_id)
                          ->with('category')
                          ->select('id', 'units', 'name')
                          ->first();

      }
    
    }

    $bColors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $product->id)->select('value')->get();
    $bColors = add_bi_color($bColors);

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
      if ($request->support === 'p') {
        $s = 'Pegamento';
      }

      if ($request->support === 'na') {
        $s = 'No incluida';
      }

      $sub_category_name = '';
      if ($product->sub_category != null) {
        $sub_category_name = $product->sub_category->name;
      }

      $unit_price = (float)str_replace(',','.',$request->unit_price);

      $p_colors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $product->id)->select('value')->get();
      $p_colors = add_bi_color($p_colors);

      $sp = [
        'id' => $product->id,
        'name' => $product->name,
        'category_id'  => $product->category_id,
        'category_name' => $product->category->name,
        'sub_category_name' => $sub_category_name,
        'color' => $request->color,
        'colors' => $p_colors,
        'avatar' => $product->avatar,
        'description' => $product->description,
        'unit_price' => $unit_price,
        'measure' => $m,
        'support' => $s,
        'amount' => $request->amount,
        'sub_total' => $request->amount * $unit_price
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

    return redirect('budget#add_product');

  }

  public function add_client_info(Request $request){

    $data = $request->all();
    $data['cuit'] = cuit($request->cuit);
    $data['phone'] = format_phone($request->phone);

    $request->session()->put('client_data', $data);

    return redirect()->route('budget');
  }

  public function remove_item(Request $request, $key){

    $p = $request->session()->get('selected_products');

    unset($p[$key]);

    $request->session()->put('selected_products', $p);

    return redirect('budget#add_product');

  }

  public function edit_item(Request $request, $id){

    $p = $request->session()->get('selected_products');

    $unit_price = (float)str_replace(',','.',$request->unit_price);

    $p[$id]['unit_price'] = $unit_price;
    $p[$id]['amount'] = $request->amount;
    $p[$id]['sub_total'] = $request->amount * $unit_price;
    $p[$id]['color'] = $request->color;

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
    if ($request->support === 'p') {
      $s = 'Pegamento';
    }

    if ($request->support === 'na') {
      $s = 'No incluida';
    }

    $p[$id]['measure'] = $m;
    $p[$id]['support'] = $s;
    
    $request->session()->put('selected_products', $p);

    return back()->withErrors($p[$id]['name']. ' actualizado');

  }

  public function create_budget(Request $request){

    $client_info = $request->session()->get('client_data');

    if (!isset($client_info) || isset($client_info['budget_info'])) {
      return redirect()->back()->withErrors('Falta el nombre del cliente');
    }

    if (!isset($client_info) || $client_info['budget_date'] == null) {
      return redirect()->back()->withErrors('Falta la fecha de presupuesto');
    }

    unset($client_info['_token']);
    unset($client_info['tax']);
    unset($client_info['delivery']);
    unset($client_info['observations']);
    unset($client_info['delivery_date']);
    unset($client_info['payment']);
    unset($client_info['budget_date']);

    if (isset($client_info['cuit'])) {
      $client_info['cuit'] = str_replace('-', '', $client_info['cuit']);
    }

    if ($client_info['cuit'] == '') {
      $client_info['cuit'] = null;
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

    $products = $budget->products->chunk(5);

    $data = [
      'client' => $client, 
      'products' => $products,
      'budget' => $budget
    ];

    $pdf = PDF::loadView('backend.budget.pdf', $data);
    
    $name = 'JordanPlas-Presupuesto_N-' . $budget->id . '.pdf';

    Storage::put('pdf/' . $name , $pdf->output(), 'public');

    $pdf_url = Storage::url($name);

    $budget->update([
      'pdf_url' => $pdf_url
    ]);

    $url = str_replace('storage/',  'storage/pdf/' , $budget->pdf_url); 
    // return Storage::download('pdf/'. $name);

    return back()->with('budget', 'http://jordanplas.test/' . $url);
  }

  public function show_pdf(Budget $budget){

    // $url = str_replace('storage/',  'storage/pdf/' , $budget->pdf_url);
    // $budgets = Budget::all();

    // return view('backend.budget.list',[
    //   'budgets' => $budgets,
    // ]);
    // $client = Client::orderBy('created_at', 'DESC')->first();

    // $products = $client->budget->products;
    // $budget = $client->budget;

    // return view('backend.budget.pdf', [
    //   'client' => $client,
    //   'products' => $products,
    //   'budget' => $budget,
    // ]);

  }

  public function list(){

    $budgets = Budget::where('budget_date', '!=', null)->get();

    return view('backend.budget.list',[
      'budgets' => $budgets,
    ]);
  }

  public function search_budget(Request $request){
    
    $budgets = Budget::where('id', 'like', '%' . $request->search . '%' )
                      ->orWhereHas('client', function($query) use($request){
                          $query
                          ->where('name', 'like', '%' . $request->search. '%')
                          ->orWhere('budget_date', 'like', '%' . $request->search. '%');
                      })
                      ->get()
                      ->where('budget_date', '!=', null);

    return view('backend.budget.list',[
      'budgets' => $budgets,
    ]);

  }

}
