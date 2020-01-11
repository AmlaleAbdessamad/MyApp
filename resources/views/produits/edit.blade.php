@extends('layouts.layout')

@section('content')
<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h2>Modifier un Produits</h2>
    <hr>
    @if (session('success'))
    <div class="messages mt-4">
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    </div>
    @endif
    <form method="POST" action="{{ route('produits.update', ['produit' => $produit]) }}">
        @csrf

        @include('produits.form')
        
        <div class="form-row">
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Modifier') }}
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
