<div class="form-row">
    <div class="form-group col-md-6">
        <label for="code_client">Code du client <span class="etoile">*</span></label>
        <input id="code_client" type="text" class="form-control @error('code_client') is-invalid @enderror" name="code_client" value="{{ old('code_client',$client->code_client ?? $newclient) }}" required autocomplete="code_client" autofocus>

        @error('code_client')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
    <label for="nom_client">Raison sociale <span class="etoile">*</span></label>
        <input id="nom_client" type="text" class="form-control @error('nom_client') is-invalid @enderror" name="nom_client" value="{{ old('nom_client',$client->nom_client ?? null) }}" required autocomplete="nom_client" autofocus>

        @error('nom_client')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fixe">Fixe</label>
        <input id="fixe" type="text" class="form-control @error('fixe') is-invalid @enderror" name="fixe" value="{{ old('fixe', $client->fixe ?? null )  }}" autocomplete="fixe" autofocus>

        @error('fixe')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="fax">Fax</label>
        <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax',$client->fax ?? null)}}" autocomplete="fax" autofocus>

        @error('fax')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="rc">RC</label>
        <input id="rc" type="text" class="form-control @error('rc') is-invalid @enderror" name="rc" value="{{ old('rc',$client->rc ?? null) }}" autocomplete="rc" autofocus>

        @error('rc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="ice">ICE</label>
        <input id="ice" type="text" class="form-control @error('ice') is-invalid @enderror" name="ice" value="{{ old('ice',$client->ice ?? null) }}" autocomplete="ice" autofocus>

        @error('ice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="responsable">Responsable</label>
        <select class="form-control @error('responsable') is-invalid @enderror" id="responsable" name="responsable" required>
            @foreach ($users as $user)
                <option value="{{$user->id}}" @if(isset($client->responsable)) @if ($client->responsable==$user->id) {{'selected'}} @endif @endif>{{$user->name}}</option>
            @endforeach
        </select>

        @error('responsable')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="remarques">Remarques</label>
        <textarea id="remarques" class="form-control @error('remarques') is-invalid @enderror" name="remarques" >{{ old('remarques',$client->remarques ?? null) }}</textarea>

        @error('remarques')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$client->email ?? null)  }}" autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="siteweb">Site Web</label>
        <input id="siteweb" type="text" class="form-control @error('siteweb') is-invalid @enderror" name="siteweb" value="{{ old('siteweb',$client->siteweb ?? null)}}" autocomplete="siteweb" autofocus>

        @error('siteweb')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>