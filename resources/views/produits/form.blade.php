<div class="form-row">
        <div class="form-group col-md-6">
            <label for="code_produit">Code du produit <span class="etoile">*</span></label>
            <input id="code_produit" type="text" class="form-control @error('code_produit') is-invalid @enderror" name="code_produit" value="{{ old('code_produit',$produit->code_produit ?? null)}}" required autocomplete="code_produit" autofocus>

            @error('code_produit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="nom_produit">Nom du produit <span class="etoile">*</span></label>
            <input id="nom_produit" type="text" class="form-control @error('nom_produit') is-invalid @enderror" name="nom_produit" value="{{ old('nom_produit',$produit->nom_produit ?? null)}}" required autocomplete="nom_produit" autofocus>

            @error('nom_produit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="designation_produit">Désignation</label>
            <textarea id="designation_produit" class="form-control @error('designation_produit') is-invalid @enderror" name="designation_produit" autocomplete="designation_produit" autofocus>{{ old('designation_produit',$produit->designation_produit ?? null)}}</textarea>

            @error('designation_produit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="famille">Famille du produit <span class="etoile">*</span></label>
            <select class="form-control @error('groupe_id') is-invalid @enderror" id="groupe_id" name="groupe_id" required>
                @foreach ($groupes_produits as $groupe)
                    <option value="{{$groupe->id}}" @if (isset($produit->groupe_id))@if ($produit->groupe_id==$groupe->id) {{'selected'}} @endif @endif>{{$groupe->nom}}</option>
                @endforeach
            </select>
            @error('groupe_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="quantite_produit">Quantité en stock</label>
            <input id="quantite_produit" type="text" class="form-control @error('quantite_produit') is-invalid @enderror" name="quantite_produit" value="{{ old('quantite_produit',$produit->quantite_produit ?? null)}}" required autocomplete="quantite_produit" autofocus>

            @error('quantite_produit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="prix_ht_achat">Prix d'achat H.T <span class="etoile">*</span></label>
            <input id="prix_ht_achat" type="text" class="form-control @error('prix_ht_achat') is-invalid @enderror" name="prix_ht_achat" value="{{ old('prix_ht_achat',$produit->prix_ht_achat ?? null)}}" required autocomplete="prix_ht_achat" autofocus>

            @error('prix_ht_achat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="prix_ht_vente">Prix de vente H.T <span class="etoile">*</span></label>
            <input id="prix_ht_vente" type="text" class="form-control @error('prix_ht_vente') is-invalid @enderror" name="prix_ht_vente" value="{{ old('prix_ht_vente',$produit->prix_ht_vente ?? null)}}" required autocomplete="prix_ht_vente" autofocus>

            @error('prix_ht_vente')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="taux_tva">Taux TVA (%) <span class="etoile">*</span></label>
            <input id="taux_tva" type="text" class="form-control @error('taux_tva') is-invalid @enderror" name="taux_tva" value="{{ old('taux_tva',$produit->taux_tva ?? null)   }}" required autocomplete="taux_tva" autofocus>

            @error('taux_tva')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>