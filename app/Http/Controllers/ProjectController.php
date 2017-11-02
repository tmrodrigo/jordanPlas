<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Certificate;
use App\Product;
use App\Service;
use App\Image;


class ProjectController extends Controller
{
  public function index()
  {
    $products = Product::all();
    $categories = Category::all();
    $projects = Project::all();
    $images = Image::all();
    $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();
    $services = Service::all();
    return view('projects', [
        'projects' => $projects,
        'categories' => $categories,
        'products' => $products,
        'images' => $images,
        'certificates' => $certificates,
        'services' => $services
    ]);
  }

  public function create(Request $request)
  {

    $this->validate($request, [
      'name' => 'required',
      'url'=> 'required | mimes:jpg,JPG,jpeg,JPEG,mp4'
    ], [
      'name.required' => 'El proyecto debe tener un nombre',
      'url.required' => 'El proyecto debe tener una imagen',
      'url.mimes' => 'La imagen debe tener formato jpg, si es video mp4'
    ]);

    $project = new Project();
    $project->name = $request['name'];
    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    $str = strtr( $request['name'], $unwanted_array );
    $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($str)) . '-' . rand(0, 100);
    $proImg = $request->file("url");
    $name = $imgName . "." . $proImg->extension();
    $folder = "projects";
    $path = $proImg->storePubliclyAs($folder, $name);
    $project->url = $path;

    $project->save();

    return redirect()->back()->with('Projectmessage', 'Imagen de proyecto cargada exitosamente');

  }

  public function destroy(Request $request, Project $project)
  {
    $project = Project::find($request['id']);

    $project->delete();

    return redirect()->back()->with('Projectmessage', 'Imagen de proyecto eliminado exitosamente');
  }
}
