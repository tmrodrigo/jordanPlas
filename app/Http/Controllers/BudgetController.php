<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use App\Budget;
use App\Category;
use App\Client;
use App\Product;
use App\Color;
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

public function show_form(Request $request)
{    
    $categories = Category::orderBy('id')->get();
    $category = $categories->first();

    if (isset($request->session()->get('data')['category'])) {
      $category_id = $request->session()->get('data')['category'];
      $category = Category::find($category_id);
    }

    $session = $request->session()->get('data');
    $selected_products = $request->session()->get('selected_products');

    // Si la categoría está seleccionada en la sesión, la utilizamos
    $selected_category = $categories[0]->id;
    if (isset($session['category'])) {
        $selected_category = $session['category'];
    }

    // Producto seleccionado
    $s_product = null;
    if (isset($session['s_product'])) {
        $s_product = $session['s_product'];
    }

    // Medida seleccionada
    $product_meassure = 0;
    if (isset($session['product_meassure'])) {
        $product_meassure = $session['product_meassure'];
    }

    // Colores
    $colors = Color::all();

    $colors = add_bi_color($colors);

    if (isset($session['colors']) && empty($session['colors'])) {
        $colors = $session['colors'];
    }

    $s_color = $colors[0]['value'];
    if (isset($session['s_color'])) {
        $s_color = $session['s_color'];
    }

    // Productos y medidas desde la sesión
    if (isset($session['products'])) {
        $products = $session['products'];
    }

    // Datos del cliente
    $client_data = $request->session()->get('client_data', []);

    if (!isset($selected_products)) {
        $selected_products = [];
    }

    // Otras variables de sesión
    $amount = $session['amount'] ?? '';
    $unit_price = $session['unit_price'] ?? '';
    $meassure = $session['meassure'] ?? '';
    $support = $session['support'] ?? '';
    $observations = $session['observations'] ?? '';
    $delivery_date = $session['delivery_date'] ?? '';
    $payment = $session['payment'] ?? '';
    $sub_category_name = $session['sub_category_name'] ?? '';

    // Cálculo del total y del IVA
    $total = arrSum($selected_products, 'sub_total') ?? '';
    $iva = '';
    if (isset($client_data['tax']) && $client_data['tax']) {
        $iva = $total * 0.21;
        $total += $iva;
    }

    // Procesar todos los productos y generar las descripciones y valores
    $productsWithMeasurements = $this->get_products($category);


    return view('backend.budget.form', [
        'categories' => $categories,
        'productsWithMeasurements' => $productsWithMeasurements,  // Combinaciones de medidas ya procesadas con keys únicos
        's_product' => $s_product,
        's_color' => $s_color,
        'colors' => $colors,
        'amount' => $amount,
        'meassure' => $meassure,
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
        'product_meassure' => $product_meassure,
    ]);
}

  private function get_meassures_from_product ($product){

      $product_meassures = [

        'height' => $product->height != null ? 'Alto: ' . $product->height . 'cm' : null,
        'width' => $product->width != null ? 'Pisada: ' . $product->width . 'cm' : null,
        'depth' => $product->depth != null ? 'Ancho: ' . $product->depth . 'cm' : null,
        'weight' => $product->weight != null ? 'Peso: ' . $product->weight . 'kg' : null,

      ];

      $product_meassures = array_filter($product_meassures, function($value){
        return !is_null($value);
      });

      $final_meassures = implode(' | ', $product_meassures);

      return $final_meassures;
  }

  private function make_unique_id ($product){

      $product_meassures = [

        'height' => $product->height != null ? $product->height : null,
        'width' => $product->width != null ?  $product->width : null,
        'depth' => $product->depth != null ?  $product->depth : null,
        'weight' => $product->weight != null ?  $product->weight : null,

      ];

      $product_meassures = array_filter($product_meassures, function($value){
        return !is_null($value);
      });

      $final_meassures = implode('', $product_meassures);

      $unique_id = $product->id . $final_meassures;

      return $unique_id;

  }

  private function get_products ($category){

    $products = $category->product;  // Obtenemos todos los productos de la primera categoría

    // Procesar todos los productos y generar las descripciones y valores
    $productsWithMeasurements = [];

    foreach ($products as $product) {
      
      $productsWithMeasurements[] = [
        'product_id' => $product->id,
        'unique_key' => $this->make_unique_id($product),
        'product_name' => $product->name,
        'description' =>  $this->get_meassures_from_product($product),
      ];

      foreach ($product->meassures as $pm) {
        $productsWithMeasurements[] = [
        'product_id' => $product->id,
        'unique_key' => $this->make_unique_id($pm),
        'product_name' => $product->name,
        'description' =>  $this->get_meassures_from_product($pm),
      ];
      }
    }

    return $productsWithMeasurements;

  }

  public function get_budget_info(Request $request){

    // Cambia la categoría
    $products = Product::where('category_id', $request->category_id)->orderBy('name')->get();
    $product = $products[0];
    $product_data = explode('-', $request->product_id);
    $product_id = $product_data[0];
    $product_meassure = '';

    array_shift($product_data);
    foreach ($product_data as $valor) {
        // Concatenamos cada valor a la variable string, separados por comas
        if ($product_meassure === '') {
            $product_meassure = $valor;
        } else {
            $product_meassure .= '<br>' . $valor;
        }
    }

    $session = $request->session()->get('data');

    if (!empty($session)) {

      //Cambia el producto
      if (($request->category_id == $session['category']) && ($session['s_product'] != $request->product_id)) {
        
        $product = Product::where('id', $product_id)
                          ->with('category')
                          ->select('id', 'units', 'name', 'category_id')
                          ->first();
      }
    
    }

    $bColors = $product->colors->where('pivot.body', true);
    $bColors = add_bi_color($bColors);

    $data = [
      'category' => $request->category_id,
      'products' => $products,
      'colors' => $bColors,
      's_color' => $request->color,
      's_product' => $product_meassure,
      'product_meassure' => $product_meassure,
      'amount' => $request->amount,
      'meassure' => $request->product_id,
      'support' => $request->support,
      'unit_price' => $request->unit_price,
    ];

    $request->session()->put('data', $data);

    // Procesar todos los productos y generar las descripciones y valores
    $productsWithMeasurements = $this->get_products($product->category);

    foreach ($productsWithMeasurements as $key => $value) {
      
      if ($value['unique_key'] == $product_meassure) {
        $product_meassure = $value['description'];
      }

    }

    if (isset($request->product_id) && isset($request->amount) && isset($request->unit_price) ) {

      $product = Product::where('id', $product_id)
                        ->with('category', 'sub_category')
                        ->select('id', 'name', 'category_id', 'avatar', 'description', 'sub_category_id', 'height')
                        ->first();

      $m = 'Metro lineal';
      if ($request->amount > 1) {
        $m = 'Metros lineales';
      }

      if ($request->meassure == false) {
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

      $p_colors = $product->colors->where('pivot.body', true);
      $p_colors = add_bi_color($p_colors);

      $hexa = 'bi-color';
      $check_hexa = $p_colors->where('value', $request->color)->first();

      if ($check_hexa != null && !is_array($check_hexa)) {
        $hexa = $check_hexa->hexa;
      }

      $sp = [
        'id' => $product->id,
        'name' => $product->name,
        'category_id'  => $product->category_id,
        'category_name' => $product->category->name,
        'sub_category_name' => $sub_category_name,
        'product_meassure' => $product_meassure,
        'color' => $request->color,
        'color_hexa' => $hexa,
        'colors' => $p_colors,
        'avatar' => $product->avatar,
        'description' => $product->description,
        'unit_price' => $unit_price,
        'meassure' => $m,
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

    $hexa = 'bi-color';
    $check_hexa = $p[$id]['colors']->where('value', $request->color)->first();

    if ($check_hexa != null && !is_array($check_hexa)) {
      $hexa = $check_hexa->hexa;
    }

    $p[$id]['color_hexa'] = $hexa;

    $m = 'Metro lineal';
    if ($request->amount > 1) {
      $m = 'Metros lineales';
    }

    if ($request->meassure == false) {
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

    $p[$id]['meassure'] = $m;
    $p[$id]['support'] = $s;
    
    $request->session()->put('selected_products', $p);

    return back()->withErrors($p[$id]['name']. ' actualizado');

  }

  public function create_budget(Request $request){

    $client_info = $request->session()->get('client_data');

    $route = 'https://jordan-plas.com/';
    $environment = App::environment();

    if ($environment == 'local') {
      $route = 'http://jordanplas.test/';
    }

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

    if ($client_info['phone'] == '') {
      $client_info['phone'] = null;
    }

    if ($client_info['email'] == '') {
      $client_info['email'] = null;
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

      $budget->products()->attach( $product['id'], [
        'amount' => $product['amount'], 
        'unit_price' => $product['unit_price'], 
        'color' => $product['color'], 
        'color_hexa' => $product['color_hexa'], 
        'unit' => $product['meassure'], 
        'support' => $product['support'],
        'measures' => $product['product_meassure']
      ]);
    
    }

    $products = $budget->products->chunk(4);

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

    if ($environment != 'local') {
      $budget_data = [];
      $products = [];

      $budget_data = $request->session()->put('client_data', $budget_data );
      $products = $request->session()->put('selected_products', $products);
    }
    
    return back()->with('budget', $route . $url);
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

    $budgets = Budget::where('budget_date', '!=', null)->orderBy('id', 'DESC')->get();

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
                      ->orderBy('id', 'DESC')
                      ->get()
                      ->where('budget_date', '!=', null);

    return view('backend.budget.list',[
      'budgets' => $budgets,
    ]);

  }

}
