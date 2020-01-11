<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class FournisseurController extends Controller
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
    //
    public function show(){

        $fournisseurs=Fournisseur::all();
        return view('fournisseurs.fournisseurs',compact("fournisseurs"));
    }
    //
    public function add(){

        $users=User::all();
        $lastfournisseur=Fournisseur::latest();
        $newfournisseur='F-'.sprintf("%03d",$lastfournisseur->max('id')+1);
        return view('fournisseurs.add',compact('newfournisseur','users'));
    }

    public function insert(){

        $data=request()->validate([
            'code_fournisseur' => ['required','string','unique:fournisseurs,code_fournisseur'],
            'nom_fournisseur' => ['required','string','unique:fournisseurs,nom_fournisseur'],
            'fixe' => ['string','nullable'],
            'fax' => ['string','nullable'],
            'remarques' => ['string','nullable'],
            'email' => ['email','nullable'],
            'siteweb' => ['string','nullable']
        ]);
        $fournisseur=Fournisseur::create($data);
        return redirect()->route('fournisseurs.edit',compact('fournisseur'))->with('success', 'fournisseur ajouté avec succès');
    }

    public function edite(Fournisseur $fournisseur){

        $users=User::all();
        return view('fournisseurs.edit',compact('fournisseur','users'));
    }

    public function update(Fournisseur $fournisseur){

        $data=request()->validate([
            'code_fournisseur' => ['required','string',Rule::unique('fournisseurs')->ignore($fournisseur->id)],
            'nom_fournisseur' => ['required','string',Rule::unique('fournisseurs')->ignore($fournisseur->id)],
            'fixe' => ['string','nullable'],
            'fax' => ['string','nullable'],
            'remarques' => ['string','nullable'],
            'email' => ['email','nullable'],
            'siteweb' => ['string','nullable']
        ]);
        $fournisseur->update($data);
        return redirect()->route('fournisseurs.edit',compact('fournisseur'))->with('success', 'fournisseur modifié avec succès');
    }

    public function delete(Fournisseur $fournisseur){

        $fournisseur->delete();
        return redirect()->route('fournisseurs.show')->with('success','fournisseur supprimé avec succès');
    }
}
