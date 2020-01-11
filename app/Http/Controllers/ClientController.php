<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\ReqClient;
use Illuminate\Validation\Rule;
use App\User;

class ClientController extends Controller
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

        $clients=Client::all();
        return view('clients.clients',compact("clients"));
    }
    //
    public function add(){
        $users=User::all();
        $lastclient=Client::latest();
        $newclient='C-'.sprintf("%03d",$lastclient->max('id')+1);
        return view('clients.add',compact('newclient','users'));
    }

    public function insert(ReqClient $request){

        $client=Client::create($request->except('_token'));
        return redirect()->route('clients.edit',compact('client'))->with('success', 'Client ajouté avec succès');
    }

    public function edite(Client $client){
        $users=User::all();
        return view('clients.edit',compact('client','users'));
    }

    public function update(Client $client){
        $data=request()->validate([
            'code_client' => ['required','string',Rule::unique('clients')->ignore($client->id)],
            'nom_client' => ['required','string',Rule::unique('clients')->ignore($client->id)],
            'rc' => ['string','nullable'],
            'ice' => ['integer','nullable'],
            'fixe' => ['string','nullable'],
            'fax' => ['string','nullable'],
            'responsable' => ['required'],
            'remarques' => ['string','nullable'],
            'email' => ['email','nullable'],
            'siteweb' => ['string','nullable']
        ]);
        $client->update($data);
        return redirect()->route('clients.edit',compact('client'))->with('success', 'Client modifié avec succès');
    }

    public function delete(Client $client){
        $client->delete();
        return redirect()->route('clients.show')->with('success','Client supprimé avec succès');
    }

    
}
