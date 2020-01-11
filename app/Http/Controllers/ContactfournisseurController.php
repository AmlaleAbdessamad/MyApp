<?php

namespace App\Http\Controllers;

use App\Contactfournisseur;
use Illuminate\Http\Request;
use Validator;

class ContactfournisseurController extends Controller
{
     //
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
        
        $data=Contactfournisseur::create($request->all());
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
        $contact=Contactfournisseur::find($request->contact_id);
        $contact->update($request->all());
        return response()->json(['success'=>'contact modifié avec succès','contact'=>request()->all()]);
    }

    public function deletecontact($id){
        $contact=Contactfournisseur::find($id);

        if($contact->delete()){
            return response()->json(['success'=>'Elément supprimé avec succes .']);
        }else{
            return response()->json(['error'=>'L\'action a échouée !','contact'=>$contact]);
        }
        return response()->json(['error'=>'action a échouée !']);
    }

    public function getcontact(Request $request){
        $contact=Contactfournisseur::find($request->id);
        return response()->json(['contact'=>$contact]);
    }
}
