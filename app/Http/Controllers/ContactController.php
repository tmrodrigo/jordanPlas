<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Mail\ContactShipped;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;


class ContactController extends Controller
{
    public function create(Request $request, Client $client)
    {
        $contact = new Client();
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->phone = $request['phone'];
        $contact->message = $request['message'];
        $contact->newsletter = $request['newsletter'];
        if ($request['budget_id']) {
            $contact->budget_id = $request['budget_id'];
        };

        // dd($contact);
        $contact->save();

        Mail::to('tm.rodrigo@gmail.com')->send(new ContactShipped($contact));
        return redirect('/')->with('message', 'Gracias por contactarnos será atendido bajo el número de solicitud: ');

    }

    public function show()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('contact' , [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function index()
    {
      $clients = Client::all();
      return view('backend.messages.messages', [
        'clients' => $clients,
        ]);
    }
}
