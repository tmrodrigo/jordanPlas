<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Mail\ContactShipped;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\Product;
use App\Project;
use App\Service;
use App\Category;
use App\Budget;
use Carbon\Carbon;


class ContactController extends Controller
{
    public function create(Request $request, Client $client)
    {

        $contact = new Client();
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->phone = $request['codigo'] . $request['phone'];
        $contact->message = $request['message'];
        $contact->newsletter = $request['newsletter'];
        if ($request['budget_id']) {
            $contact->budget_id = $request['budget_id'];
        };

        $contact->save();

        $product = $request['product_id'];
        $amount = $request['amount'];

        if (isset($product) && isset($amount)) {
            $budget = array_filter(array_combine($product, $amount));
            foreach ($budget as $product_id => $amountNumber) {
                $clientBudget = new Budget();
                $clientBudget->product_id = $product_id;
                $clientBudget->amount = $amountNumber;
                $contact->budget()->save($clientBudget);
            }
        }
        $clientId = Client::orderby('updated_at', 'desc')->first();
        $bProducts = Budget::where('client_id', '=', $clientId->id)->get();

        Mail::send('emails.welcome', ['client' => $request, 'bProducts' => $bProducts, 'id' => $clientId->id], function ($m) use ($request, $bProducts) {
            $clientId = Client::orderby('updated_at', 'desc')->first();
            $m->from('info@jordanplas.com.ar', 'Jordan Plas');
            $m->to('tm.rodrigo@gmail.com')->subject('Contacto desde el sitio web #' . $clientId->id);
        });

        return redirect()->back()->with('message', 'Gracias por contactarnos será atendido bajo el número de solicitud: ');

    }

    public function show()
    {
        $products = Product::all();
        $categories = Category::all();
        $certificates = Certificate::all();
        $clientId = Client::orderby('updated_at', 'desc')->first();
        $time = Carbon::now();
        $projects = Project::all();
        $services = Service::all();
        return view('contact' , [
            'products' => $products,
            'categories' => $categories,
            'certificates' => $certificates,
            'clientId' => $clientId,
            'time' => $time,
            'projects' => $projects,
            'services' => $services
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
