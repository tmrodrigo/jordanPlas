<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Service;
use Validator;

class CompanyController extends Controller
{
  public function index()
	{
		$data = Company::orderBy('created_at', 'desc')->first();
    $services = Service::all();
		return view('backend.company-data', [
			'data' => $data,
      'services' => $services
		]);
	}

	public function create(Request $request, Company $company)
	{
		$this->validate($request, [
			'phone' => 'numeric',
			'fax' => 'numeric',
			'celular' => 'numeric',
			'email' => 'email'
		], [
			'phone.numeric' => 'El campo teléfono debe ser un número',
			'fax.numeric' => 'El campo fax debe ser un número',
			'celular.numeric' => 'El campo celular debe ser un número',
			'email.email' => 'El campo mail no tiene el formato correcto'
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
      'phone' => 'numeric',
      'fax' => 'numeric',
      'celular' => 'numeric',
      'email' => 'email'
    ], [
      'phone.numeric' => 'El campo teléfono debe ser un número',
      'fax.numeric' => 'El campo fax debe ser un número',
      'celular.numeric' => 'El campo celular debe ser un número',
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
