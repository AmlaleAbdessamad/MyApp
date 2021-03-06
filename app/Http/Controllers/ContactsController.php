<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
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

    public function addcontact(Request $request){

        $rules=array(
            'civilite' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'fonction' => 'nullable|string',
            'tel' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|string'
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()]);
        }
        
        $data=Contact::create($request->all());
        return response()->json(['success'=>'contact ajouté avec succès','id_contact'=>$data->id]);
    }

    public function updatecontact(Request $request){

        $rules=array(
            'civilite' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'fonction' => 'nullable|string',
            'tel' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|string'
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()]);
        }
        $contact=Contact::find($request->contact_id);
        $contact->update($request->all());
        return response()->json(['success'=>'contact modifié avec succès','contact'=>request()->all()]);
    }

    public function deletecontact($id){
        $contact=Contact::find($id);

        if($contact->delete()){
            return response()->json(['success'=>'Elément supprimé avec succes .']);
        }else{
            return response()->json(['error'=>'L\'action a échouée !','contact'=>$contact]);
        }
        return response()->json(['error'=>'action a échouée !']);
    }

    public function getcontact(Request $request){
        $contact=Contact::find($request->id);
        return response()->json(['contact'=>$contact]);
    }
}
