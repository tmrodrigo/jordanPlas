<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use App\Image;
use App\Color;
use App\Company;
use App\ClientLogo;
use App\Certificate;
use App\Fixation;
use App\Meassure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::
                        orderBy('category_id')
                        ->orderBy('rating')
                        ->get();

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
        $fixations = Fixation::all();

        return view('backend.products.productsCreate', [
          'categories' => $categories,
          'colors' => $colors,
          'fixations' => $fixations

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
            'info_file' => 'required|mimes:pdf|max:3000',
        ],
        [
            'name.required' => 'Nombre requerido',
            'description.required' => 'Descripcion requerida',
            'category_id.required' => 'El producto debe tener una categoría',
            'info_file.required' => 'Falta pdf de ficha de producto',
            'info_file.mimes' => 'La ficha de producto debe ser formato PDF',
            'info_file.size' => 'La ficha de producto debe pesar menos de 3mb',
        ]);

        $infoFile = $request->file("info_file");
        $infoName = $request->name . "." . $infoFile->extension();
        $infoPath = $infoFile->storePubliclyAs("info_files", $infoName);

        $avatar = $request->file("avatar");
        $name = $request->name . "." . $avatar->extension();
        $path = $avatar->storePubliclyAs("products", $name);

        $leftPath = null;
        if ($request->file("left_img") != null) {
            $leftImg = $request->file("left_img");
            $leftName = $request->name . "-left" . "." . $leftImg->extension();
            $leftPath = $leftImg->storePubliclyAs("products", $leftName);
        }

        $rightPath = null;
        if ($request->file("right_img") != null) {
            $rightImg = $request->file("right_img");
            $rightName = $request->name . "-right" . "." . $rightImg->extension();
            $rightPath = $rightImg->storePubliclyAs("products", $rightName);
        }


        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'height' => $request->height,
            'width' => $request->width,
            'depth' => $request->depth,
            'weight' => $request->weight,
            'thickness' => $request->thickness,
            'reflex_s' => $request->reflex_s,
            'resistence' => $request->resistence,
            'info_file' => $infoPath,
            'avatar' => $path,
            'left_img' => $leftPath,
            'right_img' => $rightPath,
            'available' => $request->available,
            'units' => $request->units,
        ]);

        $p_id = $product->id;

        $product->colors()->syncWithPivotValues( $request['body_color_id'], ['body' => true]);
        $product->colors()->syncWithPivotValues( $request['light_color_id'], ['reflective' => true]);


        $fixation = Fixation::first();

        if ($fixation != null) {

            DB::table('fixation_product')
            ->insert([
                'product_id' => $p_id,
                'amount' => 4,
                'fixation_id' => $fixation->id,
            ]);
        
        }


        return redirect('backend/products')->with('message', $product->name . ' cargado correctamente');
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
        $colors = Color::all();
        $products = Product::where('category_id', '=', $product->category->id)->get();
        $fixations = Fixation::all();

        return view('backend.products.product', [
            'product' => $product,
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'certificates' => $certificates,
            'products' => $products,
            'colors' => $colors,
            'fixations' => $fixations,
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
            $product->thickness = $request['thickness'];

            $product->reflex_s = $request['reflex_s'];
            $product->resistence = $request['resistence'];
            $product->sub_category_id = null;
            if ($request['sub_category_id'] != 'null') {
                $product->sub_category_id = $request['sub_category_id'];
            }

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


        $certificates = $request['certificate_id'];

        if ($certificates == null) {
            $product->certificates()->detach();
        }
        if ($certificates != null) {
            $product->certificates()->sync($certificates);
        }

        DB::table('fixation_product')->where('product_id', $product->id)
        ->update([
            'amount' => $request['fixation_amount'],
            'fixation_id' => $request['fixation_id']
        ]);

        if (!empty($request['width-new']) || !empty($request['height-new'])) {
            Meassure::create([
                'height' => $request['height-new'],
                'width' => $request['width-new'],
                'depth' => $request['depth-new'],
                'weight' => $request['weight-new'],
                'thickness' => $request['thickness-new'],
                'reflex_s' => $request['reflex_s-new'],
                'resistence' => $request['resistence-new'],
                'product_id' => $product->id,
            ]);
        }

        return redirect('/backend/products')->with('message', $product->name . ' actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $name = $product->name;
        $product->delete();

        return redirect('/backend/products')->with('message', $name . ' eliminado correctamente');

    }

    public function showProduct($category, $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::where('category_id', '=', $product->category->id)
                            ->with('category')
                            ->orderBy('rating', 'asc')
                            ->get();

        $puntera = Product::where('name', $product->name . '-P')->first();
        $modulo = null;

        $check = str_contains($product->name, '-P');
        if ($check == true) {
            $modulo = str_replace('-P', '', $product->name);
            $modulo = Product::where('name', $modulo)->first();         
        }
                
        $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();

        $images = Image::where('category_id', '=', $product->category->id)->where('product_id', '=', $id)->get();
        $company_data = Company::orderBy('created_at', 'DESC')->first();

        $lineal_mt = null;
        if ($product->units == 'mt') {
            $lineal_mt = 100 / $product->depth;
        }

        $fixations = $product->fixation->first();

        return view('product', [
            'product' => $product,
            'categories' => $categories,
            'products' => $products,
            'certificates' => $certificates,
            'images' => $images,
            'company_data' => $company_data,
            'lineal_mt' => $lineal_mt,
            'puntera' => $puntera,
            'modulo' => $modulo,
            'fixations' => $fixations
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
        $company_data = Company::orderBy('created_at', 'DESC')->first();

        return view('productsList', [
            'products' => $products,
            'categories' => $categories,
            'company_data' => $company_data
        ]);
    }

    public function add_remove_colors(){
        
        // DB::table('colors')->delete();
        // DB::table('color_product')->delete();
        // DB::table('product_atributes')->delete();
        // DB::table('fixations')->delete();
        // DB::table('fixation_product')->delete();

        // $colors = [
        //     [
        //         'name' => 'yellow',
        //         'value' => 'Amarillo',
        //         'hexa' => '#FBD347'
        //     ],
        //     [
        //         'name' => 'black',
        //         'value' => 'Negro',
        //         'hexa' => '#1E1E1E'
        //     ],
        //     [
        //         'name' => 'white',
        //         'value' => 'Blanco',
        //         'hexa' => '#ffffff'
        //     ],
        //     [
        //         'name' => 'gray',
        //         'value' => 'Gris',
        //         'hexa' => '#B6B6B6'
        //     ],
        //     [
        //         'name' => 'orange',
        //         'value' => 'Naranja',
        //         'hexa' => '#FB8847'
        //     ],
        //     [
        //         'name' => 'green',
        //         'value' => 'Verde',
        //         'hexa' => '#22BA5B'
        //     ],
        //     [
        //         'name' => 'blue',
        //         'value' => 'Azul',
        //         'hexa' => '#0629A6'
        //     ],
        // ];

        // foreach ($colors as $color) {
        //     DB::table('colors')->insert([
        //         'name' => $color['name'],
        //         'value' => $color['value'],
        //         'hexa' => $color['hexa']
        //     ]);
        // }

        $fixations = [
            // [
            //     'tirafondo' => '3/8 X 4"',
            //     'arandela' => '25 mm',
            //     'tarugo' => '14 mm',
            //     'img_url' => 'logos/fixations/bigFixations.png'
            // ],
            // [
            //     'tirafondo' => '1/4 x 3"',
            //     'arandela' => '10 mm',
            //     'tarugo' => '18 mm',
            //     'img_url' => 'logos/fixations/smallFixations.png'
            // ],
            [
                'tirafondo' => '10 x 1 3/4"',
                'arandela' => '',
                'tarugo' => '8 mm',
                'img_url' => 'logos/fixations/regularFixations.png'
            ],
        ];

        foreach ($fixations as $f) {
            DB::table('fixations')->insert([
                'tarugo' => $f['tarugo'],
                'arandela' => $f['arandela'],
                'tirafondo' => $f['tirafondo'],
                'img_url' => $f['img_url'],
            ]);
        }

        // $bigFixation = Fixation::where('arandela', '25 mm')->first();
        // $smallFixation = Fixation::where('arandela', '10 mm')->first();

        // $products = Product::all();

        // $yellow = DB::table('colors')->where('name', 'yellow')->first();
        // $black = DB::table('colors')->where('name', 'black')->first();
        // $white = DB::table('colors')->where('name', 'white')->first();

        // foreach ($products->where('category_id', 4) as $product) {
        //     // Yellow
        //     DB::table('color_product')->insert([
        //         'color_id' => $yellow->id,
        //         'product_id' => $product->id,
        //         'body' => true,
        //         'reflective' => true,
        //     ]);

        //     // Black
        //     DB::table('color_product')->insert([
        //         'color_id' => $black->id,
        //         'product_id' => $product->id,
        //         'body' => true,
        //         'reflective' => null,
        //     ]);

        //     // White
        //     DB::table('color_product')->insert([
        //         'color_id' => $white->id,
        //         'product_id' => $product->id,
        //         'body' => null,
        //         'reflective' => true,
        //     ]);

        //     DB::table('fixation_product')->insert([
        //         'product_id' => $product->id,
        //         'fixation_id' => $smallFixation->id,
        //         'amount' => 2
        //     ]);

        //     $product->update([
        //         'available' => true
        //     ]);
        // }

        // foreach ($products->where('category_id', '!=',4) as $product) {
        //     // Yellow
        //     DB::table('color_product')->insert([
        //         'color_id' => $yellow->id,
        //         'product_id' => $product->id,
        //         'body' => true,
        //         'reflective' => true,
        //     ]);

        //     // White
        //     DB::table('color_product')->insert([
        //         'color_id' => $white->id,
        //         'product_id' => $product->id,
        //         'body' => null,
        //         'reflective' => true,
        //     ]);

        //     DB::table('fixation_product')->insert([
        //         'product_id' => $product->id,
        //         'fixation_id' => $bigFixation->id,
        //         'amount' => 4
        //     ]);

        //     $product->update([
        //         'available' => true
        //     ]);
        // }

        return "colores creados";

    }

    public function meassureDelete(Request $request){
       
        $meassure = Meassure::find($request['id']);

        $meassure->delete();

        return back()->with('message', 'Medida eliminada');
    }

    public function update_body_color(Product $product, Request $request){
        
        $product->colors()->syncWithPivotValues($request['body_color_id'], ['body' => true]);

        return back()->with('message', 'Color del cuerpo actualizado');

    }

    public function update_reflex_color(Product $product, Request $request){
        
        $product->colors()->syncWithPivotValues($request['light_color_id'], ['reflective' => true]);

        return back()->with('message', 'Color del reflectivo actualizado');

    }

}
