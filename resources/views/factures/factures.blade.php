@extends('layouts.layout')

@section('content')

<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Factures</h2>
        <a href="{{ route('factures.add') }}" class="btn btn-primary">Ajouter</a>
    </div>
    @if (session('success'))
    <div class="messages mt-4">
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    </div>
    @endif
    @if (count($factures))
    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-dark">
            <th>Date</th>
            <th>Client</th>
            <th>N° Facture</th>
            <th>Montant Total à Payée</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach ($factures as $facture)
            <tr>
                <td>{{ $facture->created_at }}</td>
                <td>{{ $facture->id_client }}</td>
                <td>{{ $facture->num_facture }}</td>
                <td>{{ $facture->total_a_payee }}</td>
                <td><a href="{{ route('factures.edit',$facture->id) }}"><span data-feather="edit" style="width:20;height:20"></span></a><a href="{{ route('factures.delete',$facture->id) }}"><span data-feather="trash-2" style="width:20;height:20" class="ml-2"></span></a></td>
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