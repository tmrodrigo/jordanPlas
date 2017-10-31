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
      'url'=> 'required | mimes:jpg,JPG,jpeg,JPEG'
    ], [
      'name.required' => 'El proyecto debe tener un nombre',
      'url.required' => 'El proyecto debe tener una imagen',
      'url.mimes' => 'La imagen debe tener formato jpg'
    ]);

    $project = new Project();
    $project->name = $request['name'];
    $imgName = str_replace(str_split('\\/:*?"<>|" "()'), '-', strtolower($request['name']));
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
