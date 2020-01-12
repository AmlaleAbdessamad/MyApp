@extends('layouts.layout')
<?php 
use \App\Http\Controllers\AdresseclientController;
$pays=AdresseclientController::getPays();
?>
@section('content')
<div class="mt-4 clearfix">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Fiche Client : {{ $client->nom_client }}</h2>
            <button type="button" class="btn btn-primary submit">Enregistrer</button>
        </div>
        @if (session('success'))
        <div class="messages mt-4">
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        </div>
        @endif
        <form method="POST" id="form_edit" action="{{ route('clients.update', ['client' => $client]) }}">
            @csrf
            @include('clients.form')
        </form>
    </div>
    {{-- tableau des contacts --}}
    
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <span data-feather="users" style="width:30px;height:30px" class="mr-2"></span><h2 class="d-inline-flex mr-4">Contacts</h2>
            <a href="#" id="add_contact" class="btn btn-sm btn-outline-secondary"><span data-feather="add" style="width:20;height:20"></span>Ajouter un contact</a>
        </div>
        <table class="table table-striped table-bordered contacts mt-4 @if (count($client->contacts)==0) {{'d-none'}}@endif">
            <thead class="thead-dark">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Fonction</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach ($client->contacts as $contact)
                <tr>
                    <td class="nom">{{ $contact->civilite.' '.$contact->nom }}</td>
                    <td class="prenom">{{ $contact->prenom }}</td>
                    <td class="fonction">{{ $contact->fonction }}</td>
                    <td class="tel">{{ $contact->tel }}</td>
                    <td class="email">{{ $contact->email }}</td>
                    <td><a href="#" id_contact="{{ $contact->id }}" title="Modifier" class="mod_contact"><i class="fas fa-pen-fancy fa-lg mr-2"></i></span></a><a href="#" id_contact="{{ $contact->id }}" title="Supprimer" class="supp_contact"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>   

    <!--tableau des Adresses-->
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <span style="width:30px;height:30px;font-size: 25px;" class="mr-2 fas fa-globe-africa"></span><h2 class="d-inline-flex mr-4">Adresses</h2>
            <a href="#" id="add_adresse" class="btn btn-sm btn-outline-secondary"><span data-feather="add" style="width:20;height:20"></span>Ajouter une Adresse</a>
        </div>
        <table class="table table-striped table-bordered adresses mt-4 @if (count($client->adresses)==0) {{'d-none'}}@endif">
            <thead class="thead-dark">
                <th>Libellé</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Pays</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach ($client->adresses as $adresse)
                <tr>
                    <td class="libelle">{{ $adresse->nom }}</td>
                    <td class="adresse">{{ $adresse->adresse }}</td>
                    <td class="ville">{{ $adresse->ville }}</td>
                    <td class="code_postal">{{ $adresse->code_postal }}</td>
                    <td class="pays">{{ $adresse->pays }}</td>
                    <td><a href="#" id_adresse="{{ $adresse->id }}" title="Modifier" class="mod_adresse"><i class="fas fa-pen-fancy fa-lg mr-2"></i></span></a><a href="#" id_adresse="{{ $adresse->id }}" title="Supprimer" class="supp_adresse"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="modal fade" id="modal_contact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_contact" action="">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <input type="hidden" name="contact_id" value="">
                        
                        <div class="form-row">
                            <label for="civilite">Civilité <span class="etoile">*</span></label>
                            <select id="civilite" class="form-control @error('civilite') is-invalid @enderror" name="civilite">
                                <option value="M">M.</option>
                                <option value="Mme">Mme.</option>
                            </select>
            
                            @error('civilite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="nom">Nom <span class="etoile">*</span></label>
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" autocomplete="nom" required autofocus>
            
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="prenom">Prénom <span class="etoile">*</span></label>
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
            
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <label for="fonction">Fonction</label>
                            <input id="fonction" type="text" class="form-control @error('fonction') is-invalid @enderror" name="fonction" value="{{ old('fonction') }}" autocomplete="fonction" autofocus>
            
                            @error('fonction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="tel">Téléphone <span class="etoile">*</span></label>
                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
            
                            @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                                <label for="phone">Portable</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="messages mt-4"></div>
                        <div class="form-row mt-4 float-right">
                            <div class="loader"></div>
                            <button type="submit" id="button_submit" class="btn btn-primary ml-4"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Adresses-->

    <div class="modal fade" id="modal_adresse" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_adresse" action="">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <input type="hidden" name="adresse_id" value="">
                        
                        <div class="form-row">
                            <label for="nom">Libellé <span class="etoile">*</span></label>
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" autocomplete="nom" required autofocus>
            
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="adresse">Adresse <span class="etoile">*</span></label>
                            <textarea id="adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse"  required>{{ old('adresse') }}</textarea>
            
                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="code_postal">Code Postal</label>
                            <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" autocomplete="code_postal" autofocus>
            
                            @error('code_postal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="ville">Ville</label>
                            <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>
            
                            @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                                <label for="pays">Pays</label>
                                <select id="pays" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>
                                    @foreach ($pays as $p)
                                        <option value="{{$p}}" @if ($p=="Maroc") {{ "selected" }} @endif>{{$p}}</option>
                                    @endforeach
                                </select>
                
                                @error('pays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="messages mt-4"></div>
                        <div class="form-row mt-4 float-right">
                            <div class="loader"></div>
                            <button type="submit" id="button_submit" class="btn btn-primary ml-4"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script text="javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //submit form client
        $('button.submit').click(function(){
            $('form#form_edit').submit();
        });
        function clearMessages(){
            $("div.messages").empty();
            $('input').removeClass('is-invalid');
        }
        // ajouter un contact
        $("#add_contact").click(function(){
            clearMessages();
            $('#modal_contact .modal-title').text("Ajouter un Contact");
            $('#modal_contact #button_submit').text("Ajouter").addClass('add').removeClass('update');
            $('#modal_contact').modal('show');
            $('#form_contact')[0].reset();
        });
    
    
        $('#form_contact').on("click",'.add',function(event){
            event.preventDefault();
            clearMessages();
            $("div.loader").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            var formData = new FormData(document.getElementById('form_contact'));
            $.ajax({
                method : "POST",
                data : formData,
                url : "{{ route('clients.contacts.add') }}",             
                dataType : "json",
                cache : false,
                processData : false,  // tell jQuery not to process the data
                contentType : false,   // tell jQuery not to set contentType
                success: function(response){
                    var message='';
                    if(response.errors){
                        message='<div class="alert alert-danger" role="alert">';
                        $.each(response.errors,function (k,v) {
                            message+='<p>'+v[0]+'</p>';
                            $('input[name="'+k+'"').addClass('is-invalid');
                            $('textarea[name="'+k+'"').addClass('is-invalid');
                        });
                        message+='</div>';
                    }
                    if(response.success){
                        
                        message='<div class="alert alert-success" role="alert">'+response.success+'</div>';
                        $('table.contacts').removeClass('d-none');
                        $('table.contacts').append('<tr>'+
                        '<td class="nom">'+$('#form_contact select[name="civilite"]').val()+' '+$('#form_contact input[name="nom"]').val()+'</td>'+
                        '<td class="prenom">'+$('#form_contact input[name="prenom"]').val()+'</td>'+
                        '<td class="fonction">'+$('#form_contact input[name="fonction"]').val()+'</td>'+
                        '<td class="tel">'+$('#form_contact input[name="tel"]').val()+'</td>'+
                        '<td class="email">'+$('#form_contact input[name="email"]').val()+'</td>'+
                        '<td><a href="#" id_contact="'+response.id_contact+'" title="Modifier" class="mod_contact"><i class="fas fa-pen-fancy fa-lg mr-2"></i><a href="#" id_contact="'+response.id_contact+'" title="Supprimer" class="supp_contact"><i class="fas fa-trash-alt fa-lg"></i></a></td></tr>');
                        $('#form_contact')[0].reset();
                    }
                    
                    $("div.loader").empty();
                    $("#form_contact div.messages").html(message);
                }
            });
        });
    
        // modifier un contact
       
        $('table.table').on("click",'a.mod_contact',function(){
            clearMessages();
            var id=$(this).attr('id_contact');
            $('#modal_contact').modal('show');
            $('#modal_contact .modal-title').text("Modifier un Contact");
            $('#modal_contact #button_submit').text("Modifier").addClass('update').removeClass('add');
            tr=$(this).parent().parent();
            $.post("{{ route('clients.contacts.get') }}",{id : id}, function(response){
                if(response){
                    $('#form_contact input[name="contact_id"]').val(id);
                    $('#form_contact select[name="civilite"]').val(response.contact.civilite);
                    $('#form_contact input[name="nom"]').val(response.contact.nom);
                    $('#form_contact input[name="prenom"]').val(response.contact.prenom);
                    $('#form_contact input[name="fonction"]').val(response.contact.fonction);
                    $('#form_contact input[name="tel"]').val(response.contact.tel);
                    $('#form_contact input[name="phone"]').val(response.contact.phone);
                    $('#form_contact input[name="email"]').val(response.contact.email);
                }
            });
        });
    
        $('#form_contact').on("click",'.update',function(event){
            event.preventDefault();
            clearMessages();
            $("div.loader").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            var formData = new FormData(document.getElementById('form_contact'));
            $.ajax({
                method : "POST",
                data : formData,
                url : "{{ route('clients.contacts.update') }}",           
                dataType : "json",
                cache : false,
                processData : false,
                contentType : false,
                success: function(response){
                    var message='';
                    if(response.errors){
                        message='<div class="alert alert-danger" role="alert">';
                        $.each(response.errors,function (k,v) {
                            message+='<p>'+v[0]+'</p>';
                            $('input[name="'+k+'"').addClass('is-invalid');
                            $('textarea[name="'+k+'"').addClass('is-invalid');
                        });
                        message+='</div>';
                    }
                    if(response.success){
                        message='<div class="alert alert-success" role="alert">'+response.success+'</div>';
                        tr.find('td.nom').text($('#form_contact select[name="civilite"]').val()+' '+$('input[name="nom"]').val());
                        tr.find('td.prenom').text($('#form_contact input[name="prenom"]').val());
                        tr.find('td.fonction').text($('#form_contact input[name="fonction"]').val());
                        tr.find('td.tel').text($('#form_contact input[name="tel"]').val());
                        tr.find('td.email').text($('#form_contact input[name="email"]').val());
                    }
                    
                    $("div.loader").empty();
                    $("#form_contact div.messages").html(message);
                }
            });
        });
        
        //supprimer un contact
        $('table.contacts').on("click",'a.supp_contact',function(event){
            var id=$(this).attr('id_contact');
            tr=$(this).parent().parent();
            if(confirm("voulez-vous vraiment supprimer ce élément ?")){
                $.ajax({
                    method : "GET",
                    url : "{{ route('clients.show') }}/contacts/delete/"+id,           
                    dataType : "json",
                    cache : false,
                    processData : false,
                    contentType : false,
                    success: function(response){
                        if(response.success){
                            tr.remove();
                            if($('table.contacts tr').length<=1)$('table.contacts').addClass('d-none');
                            alert(response.success);
                        }else{
                            alert(response.error);
                        }
                    }
                });
            }
        }); 

        //adresses

        // ajouter une adresse
        $("#add_adresse").click(function(){
            clearMessages();
            $('#modal_adresse .modal-title').text("Ajouter une adresse");
            $('#modal_adresse #button_submit').text("Ajouter").addClass('add').removeClass('update');
            $('#modal_adresse').modal('show');
            $('#form_adresse')[0].reset();
        });
    
    
        $('#form_adresse').on("click",'.add',function(event){
            event.preventDefault();
            clearMessages();
            $("div.loader").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            var formData = new FormData(document.getElementById('form_adresse'));
            $.ajax({
                method : "POST",
                data : formData,
                url : "{{ route('clients.adresses.add') }}",             
                dataType : "json",
                cache : false,
                processData : false,  // tell jQuery not to process the data
                contentType : false,   // tell jQuery not to set contentType
                success: function(response){
                    var message='';
                    if(response.errors){
                        
                        message='<div class="alert alert-danger" role="alert">';
                        $.each(response.errors,function (k,v) {
                            message+='<p>'+v[0]+'</p>';
                            $('input[name="'+k+'"').addClass('is-invalid');
                            $('textarea[name="'+k+'"').addClass('is-invalid');
                        });
                        message+='</div>';
                    }
                    if(response.success){
                        
                        message='<div class="alert alert-success" role="alert">'+response.success+'</div>';
                        $('table.adresses').removeClass('d-none');
                        $('table.adresses').append('<tr>'+
                        '<td class="libelle">'+$('#form_adresse input[name="nom"]').val()+'</td>'+
                        '<td class="adresse">'+$('#form_adresse textarea[name="adresse"]').val()+'</td>'+
                        '<td class="ville">'+$('#form_adresse input[name="ville"]').val()+'</td>'+
                        '<td class="code_postal">'+$('#form_adresse input[name="code_postal"]').val()+'</td>'+
                        '<td class="pays">'+$('#form_adresse select[name="pays"]').val()+'</td>'+
                        '<td><a href="#" id_adresse="'+response.id_adresse+'" title="Modifier" class="mod_adresse"><i class="fas fa-pen-fancy fa-lg mr-2"></i><a href="#" id_adresse="'+response.id_adresse+'" title="Supprimer" class="supp_adresse"><i class="fas fa-trash-alt fa-lg"></i></a></td></tr>');
                        $('#form_adresse')[0].reset();
                    }
                    
                    $("div.loader").empty();
                    $("#form_adresse div.messages").html(message);
                }
            });
        });
    
        // modifier une adresse
       
        $('table.adresses').on("click",'a.mod_adresse',function(){
            clearMessages();
            var id=$(this).attr('id_adresse');
            $('#modal_adresse').modal('show');
            $('#modal_adresse .modal-title').text("Modifier une Adresse");
            $('#modal_adresse #button_submit').text("Modifier").addClass('update').removeClass('add');
            tr=$(this).parent().parent();
            $.post("{{ route('clients.adresses.get') }}",{id : id}, function(response){
                if(response){
                    $('#form_adresse input[name="adresse_id"]').val(id);
                    $('#form_adresse input[name="nom"]').val(response.adresse.nom);
                    $('#form_adresse textarea[name="adresse"]').val(response.adresse.adresse);
                    $('#form_adresse input[name="ville"]').val(response.adresse.ville);
                    $('#form_adresse input[name="code_postal"]').val(response.adresse.code_postal);
                    $('#form_adresse select[name="pays"]').val(response.adresse.pays);
                }
                
            });
        });
    
        $('#form_adresse').on("click",'.update',function(event){
            event.preventDefault();
            clearMessages();
            $("div.loader").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            var formData = new FormData(document.getElementById('form_adresse'));
            $.ajax({
                method : "POST",
                data : formData,
                url : "{{ route('clients.adresses.update') }}",           
                dataType : "json",
                cache : false,
                processData : false,
                contentType : false,
                success: function(response){
                    var message='';
                    if(response.errors){
                        message='<div class="alert alert-danger" role="alert">';
                        $.each(response.errors,function (k,v) {
                            message+='<p>'+v[0]+'</p>';
                            $('input[name="'+k+'"').addClass('is-invalid');
                            $('textarea[name="'+k+'"').addClass('is-invalid');
                        });
                        message+='</div>';
                    }
                    if(response.success){
                        message='<div class="alert alert-success" role="alert">'+response.success+'</div>';
                        tr.find('td.nom').text($('#form_adresse input[name="nom"]').val());
                        tr.find('td.adresse').text($('#form_adresse textarea[name="adresse"]').val());
                        tr.find('td.ville').text($('#form_adresse input[name="ville"]').val());
                        tr.find('td.code_postal').text($('#form_adresse input[name="code_postal"]').val());
                        tr.find('td.pays').text($('#form_adresse select[name="pays"]').val());
                    }
                    
                    $("div.loader").empty();
                    $("#form_adresse div.messages").html(message);
                }
            });
        });
        
        //supprimer une adresse
        $('table.adresses').on("click",'a.supp_adresse',function(event){
            var id=$(this).attr('id_adresse');
            tr=$(this).parent().parent();
            if(confirm("voulez-vous vraiment supprimer ce élément ?")){
                $.ajax({
                    method : "GET",
                    url : "{{ route('clients.show') }}/adresses/delete/"+id,           
                    dataType : "json",
                    cache : false,
                    processData : false,
                    contentType : false,
                    success: function(response){
                        if(response.success){
                            tr.remove();
                            if($('table.adresses tr').length<=1)$('table.adresses').addClass('d-none');
                            alert(response.success);
                        }else{
                            alert(response.error);
                        }
                    }
                });
            }
        }); 
    </script>
    
@endsection
