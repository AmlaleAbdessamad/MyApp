<?php

namespace App\Http\Controllers;

use App\Adressefournisseur;
use Illuminate\Http\Request;

class AdressefournisseurController extends Controller
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
    public function addadresse(Request $request){

        $rules=array(
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'nullable|string',
            'code_postal' => 'nullable|numeric',
            'pays' => 'nullable|string',
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        
        $data=Adressefournisseur::create($request->all());
        return response()->json(['success'=>'adresse ajouté avec succès','id_adresse'=>$data->id]);
    }

    public function updateadresse(Request $request){

        $rules=array(
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'nullable|string',
            'code_postal' => 'nullable|numeric',
            'pays' => 'nullable|string',
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $adresse=Adressefournisseur::find($request->adresse_id);
        $adresse->update($request->all());
        return response()->json(['success'=>'adresse modifié avec succès','adresse'=>request()->all()]);
    }

    public function deleteadresse($id){
        $adresse=Adressefournisseur::find($id);

        if($adresse->delete()){
            return response()->json(['success'=>'Elément supprimé avec succes .']);
        }else{
            return response()->json(['error'=>'L\'action a échouée !','adresse'=>$adresse]);
        }
        return response()->json(['error'=>'action a échouée !']);
    }

    public function getadresse(Request $request){
        $adresse=Adressefournisseur::find($request->id);
        return response()->json(['adresse'=>$adresse]);
    }
}
