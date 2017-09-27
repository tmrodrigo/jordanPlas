<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;

class CertificateController extends Controller
{
    public function store(Request $request, Certificate $certificate)
		{
			$this->validate($request, [
				'name' => 'required',
				'image'=> 'required | mimes:jpg,JPG,jpeg,JPEG | dimensions:max_width=150,max_height=150'
			], [
				'name.required' => 'El certificado debe tener un nombre',
				'image.required' => 'El certifidado debe tener una imagen',
				'image.mimes' => 'El logo debe ser un jpg con fondo blanco',
				'image.dimensions' => 'El logo debe ser cuadrado y no mayor a 150px de lado'
			]);

			$certificate = new Certificate();
			$certificate->name = $request['name'];

			$certImg = $request->file("image");
			$name = $certificate->name . "-logo" . "." . $certImg->extension();
			$folder = "certificates";
			$path = $certImg->storePubliclyAs($folder, $name);
			$certificate->image = $path;

			$certificate->save();

			return redirect()->back()->with('message', 'Certificado creado exitosamente');
		}

		public function destroy(Request $request, Certificate $certificate)
		{
			$certificate = Certificate::find($request['id']);

			$certificate->delete();

			return redirect()->back()->with('message', 'Certificado eliminado exitosamente');
		}

    public function update(Request $request, Certificate $certificate)
    {

			$this->validate($request, [
				'name' => 'required',
			], [
				'name.required' => 'El certificado debe tener un nombre'
			]);

			$certificate = Certificate::find($request['id']);
			$certificate->name = $request['name'];

			if ($request['image']) {
				$certImg = $request->file("image");
				$name = $certificate->name . "-logo" . "." . $certImg->extension();
				$folder = "certificates";
				$path = $certImg->storePubliclyAs($folder, $name);
				$certificate->image = $path;
			}

			$certificate->save();

			return redirect()->back()->with('message', 'Certificado editado exitosamente');
    }
}
