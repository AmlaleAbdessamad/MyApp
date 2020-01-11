@extends('layouts.layout')

@section('content')
<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h2>Ajouter un Fournisseur</h2>
        <hr>
        <form method="POST" action="{{ route('fournisseurs.insert') }}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="code_fournisseur">Code du fournisseur <span class="etoile">*</span></label>
                    <input id="code_fournisseur" type="text" class="form-control @error('code_fournisseur') is-invalid @enderror" name="code_fournisseur" value="{{ old('code_fournisseur') ?? $newfournisseur }}" required autocomplete="code_fournisseur" autofocus>

                    @error('code_fournisseur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                <label for="nom_fournisseur">Raison sociale <span class="etoile">*</span></label>
                    <input id="nom_fournisseur" type="text" class="form-control @error('nom_fournisseur') is-invalid @enderror" name="nom_fournisseur" value="{{ old('nom_fournisseur') }}" required autocomplete="nom_fournisseur" autofocus>

                    @error('nom_fournisseur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fixe">Fixe</label>
                    <input id="fixe" type="text" class="form-control @error('fixe') is-invalid @enderror" name="fixe" value="{{ old('fixe') }}" autocomplete="fixe" autofocus>

                    @error('fixe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="fax">Fax</label>
                    <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}" autocomplete="fax" autofocus>

                    @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="siteweb">Site Web</label>
                    <input id="siteweb" type="text" class="form-control @error('siteweb') is-invalid @enderror" name="siteweb" value="{{ old('siteweb') }}" autocomplete="siteweb" autofocus>

                    @error('siteweb')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remarques">Remarques</label>
                    <textarea id="remarques" class="form-control @error('remarques') is-invalid @enderror" name="remarques" >{{ old('remarques') }}</textarea>

                    @error('remarques')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
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
