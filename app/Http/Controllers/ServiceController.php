<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Product;
use App\Project;
use App\Category;
use App\Certificate;

class ServiceController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    $products = Product::all();
		$services = Service::all();
    $certificates = Certificate::take(3)->orderBy('id', 'desc')->get();
    $projects = Project::all();
    return view('services', [
      'categories' => $categories,
      'products' => $products,
			'services' => $services,
      'certificates' => $certificates,
      'projects' => $projects
  ]);
  }

  public function create(Request $request, Service $service)
	{
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required',
		], [
			'name.required' => 'Nombre de servicio requerido',
			'description.string' => 'Descripción del servicio requerida'
		]);

		$service = new Service;

		$service->name = $request['name'];
		$service->description = $request['description'];

		$service->save();

		return redirect()->back()->with('messageService', 'Servicio cargado correctamente');

	}

	public function update(Request $request, Service $service)
	{
    $service = Service::find($request['id']);

		$service->name = $request['name'];
		$service->description = $request['description'];

		$service->update();

		return redirect()->back()->with('messageService', 'Servicio actualizado correctamente');

	}

	public function destroy(Request $request, Service $service)
	{

		$service = Service::find($request['id']);

		$service->delete();

		return redirect()->back()->with('messageService', 'Servicio eliminado de la base de datos');
	}
}
