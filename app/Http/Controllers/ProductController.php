<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Groupeproduit;
use Illuminate\Validation\Rule;

class ProductController extends Controller
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

        $produits=Produit::all();
        return view('produits.produits',compact("produits"));
    }
    //
    public function add(){

        $groupes_produits=Groupeproduit::all();
        return view('produits.add',compact('groupes_produits'));
    }

    public function insert(){

        $data=request()->validate([
            'code_produit' => ['required','string','unique:produits,code_produit'],
            'nom_produit' => ['required','string','unique:produits,nom_produit'],
            'groupe_id' => ['required'],
            'designation_produit' => ['string','nullable'],
            'quantite_produit' => ['required','integer'],
            'prix_ht_achat' => ['required','numeric'],
            'prix_ht_vente' => ['required','numeric'],
            'taux_tva' => ['required','numeric']
        ]);
        Produit::create($data);
        return redirect()->route('produits.edit',compact('produit'))->with('success', 'Produit ajouté avec succès');
    }

    public function edite(Produit $produit){

        $groupes_produits=Groupeproduit::all();
        return view('produits.edit',compact('groupes_produits','produit'));
    }


    public function update(Produit $produit){

        $data=request()->validate([
            'code_produit' => ['required','string',Rule::unique('produits')->ignore($produit->id)],
            'nom_produit' => ['required','string',Rule::unique('produits')->ignore($produit->id)],
            'groupe_id' => ['required'],
            'designation_produit' => ['string','nullable'],
            'quantite_produit' => ['required','integer'],
            'prix_ht_achat' => ['required','numeric'],
            'prix_ht_vente' => ['required','numeric'],
            'taux_tva' => ['required','numeric']
        ]);
        $produit->update($data);
        return redirect()->route('produits.edit',compact('produit'))->with('success', 'Produit modifié avec succès');
    }

    public function delete(Produit $produit){

        $produit->delete();
        return redirect()->route('produits.show')->with('success','Produit supprimé avec succès');
    }
}
