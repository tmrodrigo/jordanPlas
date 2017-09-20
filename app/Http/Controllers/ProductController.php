<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image;
use App\Color;
use App\Certificate;
use App\ProductAtribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('backend.products.productsList', [
          'products' => $products,
          'categories' => $categories
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $certificates = Certificate::all();
        return view('backend.products.productsCreate', [
          'categories' => $categories,
          'colors' => $colors,
          'certificates' => $certificates,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'reflex_s' => 'nullable|numeric',
            'resistence' => 'nullable|numeric',
            'body_color_id' => 'nullable',
            'light_color_id' => 'nullable',
            'rating' => 'nullable',
            'certificate_id' => 'nullable',
            'certificate_description' => 'nullable',
            'info_file' => 'required|mimes:pdf|max:3000',
            'manual_file' => 'nullable|mimes:pdf|max:5000',
            'avatar' => 'required|mimes:png|max:250',
            'left_img' => 'required|mimes:png|max:250',
            'right_img' => 'required|mimes:png|max:250',
            'units' => 'required'
        ],
        [
            'name.required' => 'Nombre requerido',
            'description.required' => 'Descripcion requerida',
            'category_id.required' => 'El producto debe tener una categoría',
            'width.numeric' => 'El ancho debe ser un número',
            'height.numeric' => 'El alto debe ser un número',
            'depth.numeric' => 'La profundidad debe ser un número',
            'weight.numeric' => 'El peso debe ser un número',
            'reflex_s.numeric' => 'La superficie reflexiva debe ser un número',
            'resistence.numeric' => 'La resistencia debe ser un número',
            'info_file.required' => 'Falta pdf de ficha de producto',
            'info_file.mimes' => 'La ficha de producto debe ser formato PDF',
            'info_file.size' => 'La ficha de producto debe pesar menos de 3mb',
            'avatar.required' => 'Falta imagen de producto',
            'avatar.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'avatar.size' => 'La imagen de producto no debe pesar más de 250kb',
            'left_img.required' => 'Falta imagen de ficha de producto izquierda',
            'left_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'left_img.size' => 'La imagen de producto no debe pesar más de 250kb',
            'right_img.required' => 'Falta imagen de ficha de producto derecha',
            'right_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'right_img.size' => 'La imagen de producto no debe pesar más de 250kb',
            'units.required' => 'Indique la unidad del producto'
        ]);

        $product = new Product();

            $product->name = $request['name'];
            $product->description = $request['description'];
            $product->category_id = $request['category_id'];

            $product->height = $request['height'];
            $product->width = $request['width'];
            $product->depth = $request['depth'];
            $product->weight = $request['weight'];

            $product->reflex_s = $request['reflex_s'];
            $product->resistence = $request['resistence'];

            $infoFile = $request->file("info_file");
            $infoName = $product->name . "." . $infoFile->extension();
            $infoFolder = "info_files";
            $infoPath = $infoFile->storePubliclyAs($infoFolder, $infoName);
            $product->info_file = $infoPath;

            if ($request["manual_file"]) {
                $manualFile = $request->file("manual_file");
                $manualName = $product->name . "." . $manualFile->extension();
                $manualFolder = "manual_files";
                $manualPath = $manualFile->storePubliclyAs($manualFolder, $manualName);
                $product->manual_file = $manualPath;
            }

            $leftImg = $request->file("left_img");
            $leftName = $product->name . "-left" . "." . $leftImg->extension();
            $leftFolder = "products";
            $leftPath = $leftImg->storePubliclyAs($leftFolder, $leftName);
            $product->left_img = $leftPath;

            $rightImg = $request->file("right_img");
            $rightName = $product->name . "-right" . "." . $rightImg->extension();
            $rightFolder = "products";
            $rightPath = $rightImg->storePubliclyAs($rightFolder, $rightName);
            $product->right_img = $rightPath;

            $avatar = $request->file("avatar");
            $name = $product->name . "." . $avatar->extension();
            $folder = "products";
            $path = $avatar->storePubliclyAs($folder, $name);
            $product->avatar = $path;

            $product->rating = $request['rating'];

            $product->available = $request['available'];
            $product->units = $request['units'];


        $product->save();

        $bodyColor = $request['body_color_id'];
        foreach ($bodyColor as $key => $value) {
            $atribute = new ProductAtribute();
            $atribute->atribute = "body_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        }

        $reflexColor = $request['ligth_color_id'];
        if (is_array($reflexColor)) {
            $atribute = new ProductAtribute();
            $atribute->atribute = "reflex_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        } else {
            $atribute = new ProductAtribute();
            $atribute->atribute = "reflex_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        }
        if (isset($request['certificate'])) {
            $certificate = $request['certificate'];

            foreach ($certificate as $key => $value) {
                $atribute = new ProductAtribute();
                $atribute->atribute = "certificate";
                $atribute->value = $value;
                $product->atributes()->save($atribute);
            }
        }


        return redirect('backend/products')->with('message', 'Producto cargado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        $certificates = Certificate::all();
        return view('backend.products.product', [
            'product' => $product,
            'categories' => $categories,
            'certificates' => $certificates
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'depth' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'reflex_s' => 'nullable|numeric',
            'resistence' => 'nullable|numeric',
            'body_color_id' => 'nullable',
            'light_color_id' => 'nullable',
            'rating' => 'nullable',
            'certificate_id' => 'nullable',
            'certificate_description' => 'nullable',
            'info_file' => 'required|mimes:pdf|max:3000',
            'manual_file' => 'nullable|mimes:pdf|max:5000',
            'avatar' => 'required|mimes:png|max:250',
            'left_img' => 'required|mimes:png|max:250',
            'right_img' => 'required|mimes:png|max:250'
        ],
        [
            'name.required' => 'Nombre requerido',
            'description.required' => 'Descripcion requerida',
            'category_id.required' => 'El producto debe tener una categoría',
            'width.numeric' => 'El ancho debe ser un número',
            'height.numeric' => 'El alto debe ser un número',
            'depth.numeric' => 'La profundidad debe ser un número',
            'weight.numeric' => 'El peso debe ser un número',
            'reflex_s.numeric' => 'La superficie reflexiva debe ser un número',
            'resistence.numeric' => 'La resistencia debe ser un número',
            'info_file.required' => 'Falta pdf de ficha de producto',
            'info_file.mimes' => 'La ficha de producto debe ser formato PDF',
            'info_file.size' => 'La ficha de producto debe pesar menos de 3mb',
            'avatar.required' => 'Falta imagen de producto',
            'avatar.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'avatar.size' => 'La imagen de producto no debe pesar más de 250kb',
            'left_img.required' => 'Falta imagen de ficha de producto izquierda',
            'left_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'left_img.size' => 'La imagen de producto no debe pesar más de 250kb',
            'right_img.required' => 'Falta imagen de ficha de producto derecha',
            'right_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'right_img.size' => 'La imagen de producto no debe pesar más de 250kb',
        ]);

        $product = new Product();

            $product->name = $request['name'];
            $product->description = $request['description'];
            $product->category_id = $request['category_id'];

            $product->height = $request['height'];
            $product->width = $request['width'];
            $product->depth = $request['depth'];
            $product->weight = $request['weight'];

            $product->reflex_s = $request['reflex_s'];
            $product->resistence = $request['resistence'];

            $infoFile = $request->file("info_file");
            $infoName = $product->name . "." . $infoFile->extension();
            $infoFolder = "info_files";
            $infoPath = $infoFile->storePubliclyAs($infoFolder, $infoName);
            $product->info_file = $infoPath;

            if ($request["manual_file"]) {
                $manualFile = $request->file("manual_file");
                $manualName = $product->name . "." . $manualFile->extension();
                $manualFolder = "manual_files";
                $manualPath = $manualFile->storePubliclyAs($manualFolder, $manualName);
                $product->manual_file = $manualPath;
            }

            $leftImg = $request->file("left_img");
            $leftName = $product->name . "-left" . "." . $leftImg->extension();
            $leftFolder = "products";
            $leftPath = $leftImg->storePubliclyAs($leftFolder, $leftName);
            $product->left_img = $leftPath;

            $rightImg = $request->file("right_img");
            $rightName = $product->name . "-right" . "." . $rightImg->extension();
            $rightFolder = "products";
            $rightPath = $rightImg->storePubliclyAs($rightFolder, $rightName);
            $product->right_img = $rightPath;

            $avatar = $request->file("avatar");
            $name = $product->name . "." . $avatar->extension();
            $folder = "products";
            $path = $avatar->storePubliclyAs($folder, $name);
            $product->avatar = $path;

            $product->rating = $request['rating'];


        $product->save();

        $bodyColor = $request['body_color_id'];
        foreach ($bodyColor as $key => $value) {
            $atribute = new ProductAtribute();
            $atribute->atribute = "body_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        }

        $reflexColor = $request['ligth_color_id'];
        if (is_array($reflexColor)) {
            $atribute = new ProductAtribute();
            $atribute->atribute = "reflex_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        } else {
            $atribute = new ProductAtribute();
            $atribute->atribute = "reflex_color";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        }

        $certificate = $request['certificate'];

        foreach ($certificate as $key => $value) {
            $atribute = new ProductAtribute();
            $atribute->atribute = "certificate";
            $atribute->value = $value;
            $product->atributes()->save($atribute);
        }

        return redirect('/backend/products')->with('message', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect( '/backend/products');
    }

    // metodos

    public function showProduct($id)
    {
        $categories = Category::all();
        // $category = Product::where('category_id', '=', $id)->first();
        $product = Product::find($id);
        $products = Product::all();
        // $images = Image::where('category_id', '=', $id)->get();
        // $bodyColors = ProductAtribute::where('product_atributes')->where('product_id', '=', $id)->get();
        // $reflexColors = ProductAtribute::where('atribute', '=', 'reflex_color')->get();
        return view('product', [
            'product' => $product,
            'categories' => $categories,
            'products' => $products,
            // 'bodyColors' => $bodyColors,
            // 'reflexColors' => $reflexColors
            // 'images' => $images,
        ]);
    }

    public function imagesUpload(){
        $categories = Category::all();
        $products = Product::all();
        return view('backend.images', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function storeImages(Request $request, Image $image)
    {
        $path = public_path().'/storage/images/';
            $files = $request->file('file');
            foreach($files as $file){
                $image = new Image();
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
                $image->url = "images/products/" . $fileName;
                $image->category_id = $request['category_id'];
                $image->product_id = $request['product_id'];
                $image->save();
            }

    }

    public function search()
    {

    $keyword = Input::get('s');
    $products = Product::all();
    $categories = Category::all();
    $topProducts = Product::where('rating', '>', '3')->get();
    $productList = Product::where('name', 'like', '%' . $keyword . '%')
                            ->orWhere('description', 'like', '%' . $keyword . '%')
                            ->orderBy('rating', 'asc')
                            ->get();
        return view('productsList', [
            'productList' => $productList,
            'categories' => $categories,
            'topProducts' => $topProducts,
            'products' => $products
        ]);
    }

}
