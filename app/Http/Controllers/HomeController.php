<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        
 
        if($request){
           $search = trim($request->get('search'));
  

        

        $contacts = Contact::whereHas('user', function ($query) use ($search) {
        $query->where('firstname', 'like', '%'.$search.'%')
        ->where('user_id', '=', auth()->user()->id)
        
        ;
         })->paginate(5);
        
        //  dd($contacts);
           
        //    $contacts = User::with('contacts')
        // //    ->where('status_id', '!=', '2')
        // //    ->where('contacts.firstname', '=' , 'Kaitlyn Koepp')
        //    ->find(auth()->user()->id)
        //    ->contacts()->paginate(10);
        //     $array = $contacts->all();
         
           return view('home', compact('contacts'));
        }else{
        
        return view('home', compact('contacts'));
        }
        
      
        
        
        
        
    }
 
    

}
