<?php

namespace App\Http\Controllers;

use App\Product;
use App\Project;
use App\Service;
use App\Category;
use App\SubCategory;
use App\Image;
use App\Color;
use App\ClientLogo;
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
        $rColors = Color::all();
        $bColors = Color::all();
        $certificates = Certificate::all();
        return view('backend.products.productsCreate', [
          'categories' => $categories,
          'rColors' => $rColors,
          'bColors' => $bColors,
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
            'avatar' => 'required|mimes:png|max:600',
            'left_img' => 'required|mimes:png|max:600',
            'right_img' => 'required|mimes:png|max:600',
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
            'avatar.max' => 'La imagen de producto no debe pesar más de 600 kb',
            'left_img.required' => 'Falta imagen de ficha de producto izquierda',
            'left_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'left_img.max' => 'La imagen de producto no debe pesar más de 600kb',
            'right_img.required' => 'Falta imagen de ficha de producto derecha',
            'right_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'right_img.max' => 'La imagen de producto no debe pesar más de 600kb',
            'units.required' => 'Indique la unidad del producto'
        ]);

        $product = new Product();

            $product->name = $request['name'];
            $product->description = $request['description'];
            $product->category_id = $request['category_id'];
            $product->sub_category_id = $request['sub_category_id'];

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

        $reflexColor = $request['light_color_id'];

        $certificates = $request['certificate_id'];

        if (isset($bodyColor) || isset($reflexColor)) {
          if (is_array($bodyColor)){
            foreach ($bodyColor as $key => $value) {
                $atribute = new ProductAtribute();
                $atribute->atribute = "body_color";
                $atribute->value = $value;
                $product->atributes()->save($atribute);
            }
          }
          if (is_array($reflexColor)) {
            foreach ($reflexColor as $key => $value) {
              $atribute = new ProductAtribute();
              $atribute->atribute = "reflex_color";
              $atribute->value = $value;
              $product->atributes()->save($atribute);
            }
          }
        }

        if ((is_array($certificates)) && $certificates != null) {
          foreach ($certificates as $key => $value) {
            $product->certificates()->attach($value);
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
        $sub_categories = SubCategory::all();
        $certificates = Certificate::all();
        $bColors = Color::all();
        $rColors = Color::all();
        $products = Product::where('category_id', '=', $product->category->id)->get();

        return view('backend.products.product', [
            'product' => $product,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'certificates' => $certificates,
            'products' => $products,
            'bColors' => $bColors,
            'rColors' => $rColors
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
            'height' => 'nullable',
            'width' => 'nullable',
            'depth' => 'nullable',
            'weight' => 'nullable',
            'reflex_s' => 'nullable|numeric',
            'resistence' => 'nullable|numeric',
            'body_color_id' => 'nullable',
            'light_color_id' => 'nullable',
            'rating' => 'nullable',
            'certificate_id' => 'nullable',
            'certificate_description' => 'nullable',
            'info_file' => 'mimes:pdf|max:3000',
            'manual_file' => 'nullable|mimes:pdf|max:5000',
            'avatar' => 'mimes:png|max:450',
            'left_img' => 'mimes:png|max:450',
            'right_img' => 'mimes:png|max:450'
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
            'info_file.mimes' => 'La ficha de producto debe ser formato PDF',
            'info_file.size' => 'La ficha de producto debe pesar menos de 3mb',
            'avatar.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'avatar.max' => 'La imagen de producto no debe pesar más de 450kb',
            'left_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'left_img.max' => 'La imagen de producto no debe pesar más de 450kb',
            'right_img.mimes' => 'La imagen de producto debe estar en formato png con fondo transparente',
            'right_img.max' => 'La imagen de producto no debe pesar más de 450kb'
        ]);

        $product = Product::find($request['id']);

            $product->name = $request['name'];
            $product->description = $request['description'];
            $product->category_id = $request['category_id'];

            $product->height = $request['height'];
            $product->width = $request['width'];
            $product->depth = $request['depth'];
            $product->weight = $request['weight'];

            $product->reflex_s = $request['reflex_s'];
            $product->resistence = $request['resistence'];
            $product->sub_category_id = $request['sub_category_id'];

            if ($request['info_file'] || $request["manual_file"] || $request['left_img'] || $request['right_img'] || $request['avatar'] || $request['rating'] || $request['units'])
            {
                if (isset($request['info_file'])) {
                    $infoFile = $request->file("info_file");
                    $infoName = $product->name . "." . $infoFile->extension();
                    $infoFolder = "info_files";
                    $infoPath = $infoFile->storePubliclyAs($infoFolder, $infoName);
                    $product->info_file = $infoPath;
                }

                if (isset($request["manual_file"])) {
                    $manualFile = $request->file("manual_file");
                    $manualName = $product->name . "." . $manualFile->extension();
                    $manualFolder = "manual_files";
                    $manualPath = $manualFile->storePubliclyAs($manualFolder, $manualName);
                    $product->manual_file = $manualPath;
                }

                $leftImg = $request->file("left_img");

                if (isset($leftImg)) {
                    $leftName = $product->name . "-left" . "." . $leftImg->extension();
                    $leftFolder = "products";
                    $leftPath = $leftImg->storePubliclyAs($leftFolder, $leftName);
                    $product->left_img = $leftPath;
                }

                $rightImg = $request->file("right_img");

                if (isset($rightImg)) {
                    $rightName = $product->name . "-right" . "." . $rightImg->extension();
                    $rightFolder = "products";
                    $rightPath = $rightImg->storePubliclyAs($rightFolder, $rightName);
                    $product->right_img = $rightPath;
                }

                $avatar = $request->file("avatar");

                if (isset($avatar)) {
                    $name = $product->name . "." . $avatar->extension();
                    $folder = "products";
                    $path = $avatar->storePubliclyAs($folder, $name);
                    $product->avatar = $path;
                }

                $product->rating = $request['rating'];

                $product->units = $request['units'];
            }

            $product->available = $request['available'];


        $product->save();

        $reflexColor = $request['light_color_id'];

        if (isset($request['body_color_id'])) {
            foreach ($request['body_color_id'] as $key => $value) {
                $atribute = new ProductAtribute();
                $atribute->atribute = "body_color";
                $atribute->value = $value;
                $product->atributes()->save($atribute);
            }
        }

        if (isset($reflexColor)) {
          if (is_array($reflexColor)) {
              foreach ($reflexColor as $key => $value) {
                  $atribute = new ProductAtribute();
                  $atribute->atribute = "reflex_color";
                  $atribute->value = $value;
                  $product->atributes()->save($atribute);
            }
          } else {
              $atribute = new ProductAtribute();
              $atribute->atribute = "reflex_color";
              $atribute->value = $value;
              $product->atributes()->save($atribute);
          }
        }

        $certificates = $request['certificate_id'];

        if ($certificates == null) {
            $product->certificates()->detach();
        }
        if ($certificates != null) {
            $product->certificates()->sync($certificates);
        }

        return redirect()->back()->with('message', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/backend/products')->with('message', 'Producto eliminado correctamente');

    }

    public function showProduct($category, $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::where('category_id', '=', $product->category->id)
                            ->with('category')
                            ->orderBy('rating', 'asc')
                            ->orderBy('updated_at', 'desc')
                            ->get();
        $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();
        $bColors = ProductAtribute::where('atribute', '=', 'body_color')->where('product_id', '=', $product->id)->select('value')->get();
        $rColors = ProductAtribute::where('atribute', '=', 'reflex_color')->where('product_id', '=', $id)->get();
        $images = Image::where('category_id', '=', $product->category->id)->where('product_id', '=', $id)->get();
        
        return view('product', [
            'product' => $product,
            'categories' => $categories,
            'products' => $products,
            'certificates' => $certificates,
            'bColors' => $bColors,
            'rColors' => $rColors,
            'images' => $images
        ]);
    }

    public function imagesUpload(){
        $categories = Category::all();
        $products = Product::orderBy('name', 'asc')->get();
        $images = Image::all();
        return view('backend.images', [
            'categories' => $categories,
            'products' => $products,
            'images' => $images
        ]);
    }

    public function imageDelete(Request $request)
    {
        $image = Image::find($request['id']);

        $image->delete();

        return redirect()->back()->with('ImgMessage', 'Imagen eliminada correctamente');
    }

    public function storeImages(Request $request, Image $image)
    {
        if ($request['client'] == 'client') {
            // $path = public_path().'/storage/clients/';
                $files = $request->file('file');
                foreach($files as $file){
                  $image = new ClientLogo();
                  $fileName = $file->getClientOriginalName();
                  $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($fileName));
                  $folder = "clients";
                  $path = $file->storePubliclyAs($folder, $imgName);
                  $image->url = $path;
                  $image->save();

                }
        } elseif ($request['client'] == 'company') {
            $files = $request->file('file');
            foreach($files as $file){
                $image = new Image();
                $fileName = $file->getClientOriginalName();
                $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($fileName));
                $folder = "company";
                $path = $file->storePubliclyAs($folder, $imgName);
                $image->url = $path;

                $image->category_id = 'company';

                $image->save();
            }
        }
         else {
            // $path = public_path().'/storage/images/';a
                $files = $request->file('file');
                foreach($files as $file){
                    $image = new Image();
                    $fileName = $file->getClientOriginalName() . '-' . $request['product_id'] . '-' . $request['category_id'];
                    $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($fileName));
                    $folder = "products";
                    $path = $file->storePubliclyAs($folder, $imgName);
                    $image->url = $path;

                    $image->category_id = $request['category_id'];
                    $image->product_id = $request['product_id'];
                    $image->save();
                }
        }

    }

    public function search(Request $request)
    {
    
        $keyword = $request->search;

        $categories = Category::all();
        $products = Product::where('name', 'like', '%' . $keyword)
                                ->orWhere('description', 'like', '%' . $keyword . '%')
                                ->orderBy('name')
                                ->with('category')
                                ->get();

        return view('productsList', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

}
