<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact; 
// use Mail\TestMail;
class ContactController extends Controller
{
    //
    public function __construct(){

        $this->middleware('auth'); //midleware auth que nos provee laravel. lo usamos al iniciar el constructor entyr para que solo los autenticados puedan usarlo.

    }
    public function create(){

        return view ('contacts.create');

    }
    public function store(Request $request){

        // dd($request->all());
        $validatedData = $request->validate([
            //Sentencia para validar data de laravel , pasamos las reglas 
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contactnumber' => 'required'


        ]);
        $contact = new Contact();
        $contact->firstname = $validatedData['firstname'];
        $contact->lastname = $validatedData['lastname'];
        $contact->email = $validatedData['email'];
        $contact->contactnumber = $validatedData['contactnumber'];
        $contact->user_id = auth()->id();
        
        $contact->save(); //INSERT
        $status = 'Your contact has been publishied succesfully'; 

        // Mail::to($validatedData["email"])->send(new TestMail("Prueba"));
        return back()->with(compact('status')); 
        

    }
    public function show(Contact $contact){
       
        return view('contacts.show', compact('contact'));
        $status = 'Your contact has been destroyed succesfully'; 
        return back()->with(compact('status')); 
    }
    public function delete(Contact $contact){
       
        $note = Contact::find($contact->id);
        
        $note->delete();
 
        $status = 'Your contact has been destroyed succesfully'; 
        return back()->with(compact('status'));
    }
    public function edit (Request $request, Contact $contact){

        // dd($request->all());
        $validatedData = $request->validate([
            //Sentencia para validar data de laravel , pasamos las reglas 
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contactnumber' => 'required'


        ]); 
      
        $contact->firstname = $validatedData['firstname'];
        $contact->lastname = $validatedData['lastname'];
        $contact->email = $validatedData['email'];
        $contact->contactnumber = $validatedData['contactnumber'];
        
       
        
        $contact->save(); //INSERT
        $status = 'Your contact has been updated succesfully'; //devolvemos status que se mostrar en la vista
        return back()->with(compact('status')); 
    }
}
