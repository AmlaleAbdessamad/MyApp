<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReqClient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_client' => ['required','string','unique:clients,code_client'],
            'nom_client' => ['required','string','unique:clients,nom_client'],
            'rc' => ['string','nullable'],
            'ice' => ['integer','nullable'],
            'fixe' => ['string','nullable'],
            'fax' => ['string','nullable'],
            'responsable' => ['required'],
            'remarques' => ['string','nullable'],
            'email' => ['email','nullable'],
            'siteweb' => ['string','nullable']
        ];
    }
}
