<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Service;
use App\Project;
use Validator;

class CompanyController extends Controller
{
  public function index()
	{
		$data = Company::orderBy('created_at', 'desc')->first();
    $services = Service::all();
    $projects = Project::all();
		return view('backend.company-data', [
			'data' => $data,
      'services' => $services,
      'projects' => $projects
		]);
	}

	public function create(Request $request, Company $company)
	{

		$this->validate($request, [
			'email' => 'email',
			'description' => 'required',
			'phone' => 'required',
			'fax' => 'required',
			'celular' => 'required',
		], [
			'email.email' => 'El campo mail no tiene el formato correcto',
			'email.required' => 'El email es requerido',
			'description.required' => 'La descripción es requerida',
			'phone.required' => 'El teléfono es requerido',
			'celular.required' => 'El celular es requerido'
		]);

		$data = new Company;

		$data->description = $request['description'];
		$data->phone = $request['phone'];
		$data->fax = $request['fax'];
		$data->celular = $request['celular'];
		$data->email = $request['email'];
		$data->address = $request['address'];

		$data->save();

		return redirect()->back()->with('message', 'Datos cargados correctamente');
	}

  public function update(Request $request, Company $company)
  {
    $this->validate($request, [
      'email' => 'email',
    ], [
      'email.email' => 'El campo mail no tiene el formato correcto'
    ]);

    $data = Company::find($request['id']);

    $data->description = $request['description'];
    $data->phone = $request['phone'];
    $data->fax = $request['fax'];
    $data->celular = $request['celular'];
    $data->email = $request['email'];
    $data->address = $request['address'];

    $data->update();

    return redirect()->back()->with('message', 'Datos actualizados correctamente');
  }
}
