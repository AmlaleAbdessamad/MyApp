@extends('layouts.layout')

@section('content')
<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2>Ajouter un Client</h2>
        <hr>
        <form method="POST" action="{{ route('clients.insert') }}">
            @csrf
            @include('clients.form')
            <div class="form-row">
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
