<?php

namespace App\Http\Controllers;

use App\Adresseclient;
use Illuminate\Http\Request;
use Validator;

class AdresseclientController extends Controller
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
    public function addadresse(Request $request){

        $rules=array(
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'nullable|string',
            'code_postal' => 'nullable|numeric',
            'pays' => 'nullable|string',
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        
        $data=Adresseclient::create($request->all());
        return response()->json(['success'=>'adresse ajouté avec succès','id_adresse'=>$data->id]);
    }

    public function updateadresse(Request $request){

        $rules=array(
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'nullable|string',
            'code_postal' => 'nullable|numeric',
            'pays' => 'nullable|string',
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $adresse=Adresseclient::find($request->adresse_id);
        $adresse->update($request->all());
        return response()->json(['success'=>'adresse modifié avec succès','adresse'=>request()->all()]);
    }

    public function deleteadresse($id){
        $adresse=Adresseclient::find($id);

        if($adresse->delete()){
            return response()->json(['success'=>'Elément supprimé avec succes .']);
        }else{
            return response()->json(['error'=>'L\'action a échouée !','adresse'=>$adresse]);
        }
        return response()->json(['error'=>'action a échouée !']);
    }

    public function getadresse(Request $request){
        $adresse=Adresseclient::find($request->id);
        return response()->json(['adresse'=>$adresse]);
    }

    public static function getPays()
    {
        //
        return $pays=["Afghanistan"
        ,"Afrique du Sud"
        ,"Aland (Îles)"
        ,"Albanie"
        ,"Algérie"
        ,"Allemagne"
        ,"Andorre"
        ,"Angola"
        ,"Anguilla"
        ,"Antarctique"
        ,"Antigua-et-Barbuda"
        ,"Arabie saoudite"
        ,"Argentine"
        ,"Arménie"
        ,"Aruba"
        ,"Australie"
        ,"Autriche"
        ,"Azerbaïdjan"
        ,"Bahamas"
        ,"Bahreïn"
        ,"Bangladesh"
        ,"Barbade"
        ,"Belgique"
        ,"Belize"
        ,"Bermudes"
        ,"Bhoutan"
        ,"Bolivie (État plurinational de)"
        ,"Bonaire, Saint-Eustache et Saba"
        ,"Bosnie-Herzégovine"
        ,"Botswana"
        ,"Bouvet (Île)"
        ,"Brunéi Darussalam"
        ,"Brésil"
        ,"Bulgarie"
        ,"Burkina Faso"
        ,"Burundi"
        ,"Bélarus"
        ,"Bénin"
        ,"Cabo Verde"
        ,"Cambodge"
        ,"Cameroun"
        ,"Canada"
        ,"Caïmans (Îles)"
        ,"Chili"
        ,"Chine"
        ,"Christmas (Île)"
        ,"Chypre"
        ,"Cocos (Îles) / Keeling (Îles)"
        ,"Colombie"
        ,"Comores"
        ,"Congo"
        ,"Congo (République démocratique du)"
        ,"Cook (Îles)"
        ,"Corée (République de)"
        ,"Corée (République populaire démocratique de)"
        ,"Costa Rica"
        ,"Croatie"
        ,"Cuba"
        ,"Curaçao"
        ,"Côte d'Ivoire"
        ,"Danemark"
        ,"Djibouti"
        ,"dominicaine (République)"
        ,"Dominique"
        ,"Egypte"
        ,"El Salvador"
        ,"Emirats arabes unis"
        ,"Equateur"
        ,"Erythrée"
        ,"Espagne"
        ,"Estonie"
        ,"Etats-Unis d'Amérique"
        ,"Ethiopie"
        ,"Falkland (Îles) / Malouines (Îles)"
        ,"Fidji"
        ,"Finlande"
        ,"France"
        ,"Féroé (Îles)"
        ,"Gabon"
        ,"Gambie"
        ,"Ghana"
        ,"Gibraltar"
        ,"Grenade"
        ,"Groenland"
        ,"Grèce"
        ,"Guadeloupe"
        ,"Guam"
        ,"Guatemala"
        ,"Guernesey"
        ,"Guinée"
        ,"Guinée équatoriale"
        ,"Guinée-Bissau"
        ,"Guyana"
        ,"Guyane française"
        ,"Géorgie"
        ,"Géorgie du Sud-et-les Îles Sandwich du Sud"
        ,"Haïti"
        ,"Heard-et-MacDonald (Île)"
        ,"Honduras"
        ,"Hong Kong"
        ,"Hongrie"
        ,"Ile de Man"
        ,"Iles mineures éloignées des États-Unis"
        ,"Inde"
        ,"Indien (Territoire britannique de océan)"
        ,"Indonésie"
        ,"Iran (République Islamique d')"
        ,"Iraq"
        ,"Irlande"
        ,"Islande"
        ,"Israël"
        ,"Italie"
        ,"Jamaïque"
        ,"Japon"
        ,"Jersey"
        ,"Jordanie"
        ,"Kazakhstan"
        ,"Kenya"
        ,"Kirghizistan"
        ,"Kiribati"
        ,"Koweït"
        ,"Lao, République démocratique populaire"
        ,"Lesotho"
        ,"Lettonie"
        ,"Liban"
        ,"Libye"
        ,"Libéria"
        ,"Liechtenstein"
        ,"Lituanie"
        ,"Luxembourg"
        ,"Macao"
        ,"Macédoine (ex-République yougoslave de)"
        ,"Madagascar"
        ,"Malaisie"
        ,"Malawi"
        ,"Maldives"
        ,"Mali"
        ,"Malte"
        ,"Mariannes du Nord (Îles)"
        ,"Maroc"
        ,"Marshall (Îles)"
        ,"Martinique"
        ,"Maurice"
        ,"Mauritanie"
        ,"Mayotte"
        ,"Mexique"
        ,"Micronésie (États fédérés de)"
        ,"Moldova (République de)"
        ,"Monaco"
        ,"Mongolie"
        ,"Montserrat"
        ,"Monténégro"
        ,"Mozambique"
        ,"Myanmar"
        ,"Namibie"
        ,"Nauru"
        ,"Nicaragua"
        ,"Niger"
        ,"Nigéria"
        ,"Niue"
        ,"Norfolk (Île)"
        ,"Norvège"
        ,"Nouvelle-Calédonie"
        ,"Nouvelle-Zélande"
        ,"Népal"
        ,"Oman"
        ,"Ouganda"
        ,"Ouzbékistan"
        ,"Pakistan"
        ,"Palaos"
        ,"Palestine, État de"
        ,"Panama"
        ,"Papouasie-Nouvelle-Guinée"
        ,"Paraguay"
        ,"Pays-Bas"
        ,"Philippines"
        ,"Pitcairn"
        ,"Pologne"
        ,"Polynésie française"
        ,"Porto Rico"
        ,"Portugal"
        ,"Pérou"
        ,"Qatar"
        ,"Roumanie"
        ,"Royaume-Uni de Grande-Bretagne et d'Irlande du Nord"
        ,"Russie (Fédération de)"
        ,"Rwanda"
        ,"République arabe syrienne"
        ,"République centrafricaine"
        ,"Réunion"
        ,"Sahara occidental"
        ,"Saint-Barthélemy"
        ,"Saint-Kitts-et-Nevis"
        ,"Saint-Marin"
        ,"Saint-Martin (partie française)"
        ,"Saint-Martin (partie néerlandaise)"
        ,"Saint-Pierre-et-Miquelon"
        ,"Saint-Siège"
        ,"Saint-Vincent-et-Grenadines"
        ,"Sainte-Hélène, Ascension et Tristan da Cunha"
        ,"Sainte-Lucie"
        ,"Salomon (Îles)"
        ,"Samoa"
        ,"Samoa américaines"
        ,"Sao Tomé-et-Principe"
        ,"Serbie"
        ,"Seychelles"
        ,"Sierra Leone"
        ,"Singapour"
        ,"Slovaquie"
        ,"Slovénie"
        ,"Somalie"
        ,"Soudan"
        ,"Soudan du Sud"
        ,"Sri Lanka"
        ,"Suisse"
        ,"Suriname"
        ,"Suède"
        ,"Svalbard et Île Jan Mayen"
        ,"Swaziland"
        ,"Sénégal"
        ,"Tadjikistan"
        ,"Tanzanie, République-Unie de"
        ,"Taïwan (Province de Chine)"
        ,"Tchad"
        ,"Tchéquie"
        ,"Terres austrafrançaises"
        ,"Thaïlande"
        ,"Timor-Leste"
        ,"Togo"
        ,"Tokelau"
        ,"Tonga"
        ,"Trinité-et-Tobago"
        ,"Tunisie"
        ,"Turkménistan"
        ,"Turks-et-Caïcos (Îles)"
        ,"Turquie"
        ,"Tuvalu"
        ,"Ukraine"
        ,"Uruguay"
        ,"Vanuatu"
        ,"Venezuela (République bolivarienne du)"
        ,"Vierges britanniques (Îles)"
        ,"Vierges des États-Unis (Îles)"
        ,"Viet Nam"
        ,"Wallis-et-Futuna "
        ,"Yémen"
        ,"Zambie"
        ,"Zimbabwe"];
    }
}
