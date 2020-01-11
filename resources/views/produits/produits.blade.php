@extends('layouts.layout')

@section('content')

<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Produits</h2>
        <a href="{{ route('produits.add') }}" class="btn btn-primary">Ajouter</a>
    </div>
    @if (session('success'))
    <div class="messages mt-4">
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    </div>
    @endif
    @if (count($produits))
    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-dark">
            <th>Code</th>
            <th>Nom</th>
            <th>Quantité en stock</th>
            <th>Famille du produit</th>
            <th>Prix de vente HT </th>
            <th>Prix de vente TTC</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach ($produits as $produit)
            <tr>
                <td>{{ $produit->code_produit }}</td>
                <td>{{ $produit->nom_produit }}</td>
                <td>{{ $produit->quantite_produit }}</td>
                <td>{{ $produit->groupe->nom }}</td>
                <td>{{ $produit->prix_ht_vente }}</td>
                <td>{{ ($produit->prix_ht_vente*$produit->taux_tva/100)+$produit->prix_ht_vente }}</td>
                <td><a href="{{ route('produits.edit',$produit->id) }}"><span data-feather="edit" style="width:20;height:20"></span></a><a href="{{ route('produits.delete',$produit->id) }}"><span data-feather="trash-2" style="width:20;height:20" class="ml-2"></span></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-danger mt-3" role="alert">
        Base de données vide !!
    </div>
    @endif
    </div>
</div>
        
@endsection