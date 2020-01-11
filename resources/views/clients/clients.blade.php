@extends('layouts.layout')

@section('content')

<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Clients</h2>
        <a href="{{ route('clients.add') }}" class="btn btn-primary">Ajouterr</a>
    </div>
    @if (session('success'))
    <div class="messages mt-4">
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    </div>
    @endif
    @if (count($clients))
    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-dark">
            <th>Code</th>
            <th>Raison sociale</th>
            <th>Fixe</th>
            <th>Fax</th>
            <th>email</th>
            <th>Site Web</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->code_client }}</td>
                <td>{{ $client->nom_client }}</td>
                <td>{{ $client->fixe }}</td>
                <td>{{ $client->fax }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->siteweb }}</td>
                <td><a href="{{ route('clients.edit',$client->id) }}"><span data-feather="edit" style="width:20;height:20"></span></a>
                    <a href="{{ route('clients.delete',$client->id) }}"><span data-feather="trash-2" style="width:20;height:20" class="ml-2"></span></a></td>
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