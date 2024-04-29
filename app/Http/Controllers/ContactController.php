<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ReasonContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // $request contém os dados da requisição feita
    {
        $types_contact = ReasonContact::all();

        return view('site.contact', ['title' => 'Super Gestão - Contatos', 'types' => $types_contact]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        echo '<pre>';
        print_r($request->all());
        print_r($request->input('name'));
        echo '</pre>';
        return view('site.contact');
        */
        /*
        // FORMA 1
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->type = $request->input('type');
        $contact->message = $request->input('message');
        $contact->save();
        */


        // FORMA 2
        // $contact = new Contact();
        //$contact->fill($request->all()); // dá certo se os mesmos campos em fillable forem passados
        //$contact->save();

        // FORMA 3
        // $contact = new Contact();
        // $contact = new Contact();
        // $contact->create($request->all());

        // FORMA ENXUTA
        $rules = [
            'name' =>'required|min:3|max:40', // regras de validação separadas por um pipe
            'email' =>'email|unique:contacts',
            'phone' =>'required',
            'reason_contacts_id' =>'required',
            'message' =>'required|max:3000'
        ];
        $feedback = [
            // mensagens personalizadas de retorno
            'name.min' => 'O nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 40 caracteres',
            'email.email' => 'Necessário um endereço de e-mail válido',
            'email.unique' => 'Este e-mail já foi cadastrado em nossa base',
            'reason_contacts_id.required' => 'O motivo é obrigatório',
            'required' => 'O campo :attribute é obrigatório'
        ];
        $request->validate($rules, $feedback);
        Contact::create($request->all());
        return redirect()->route('site.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
