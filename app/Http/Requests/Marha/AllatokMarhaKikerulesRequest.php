<?php

namespace App\Http\Requests\Marha;


use Illuminate\Foundation\Http\FormRequest;
use  App\Controllers\Marha\MarhakikerulesController;
use App\Rules\Marha\MarhaKikerulescheck;
use App\Rules\Marha\MarhaSzarmazastenyeszetcheck;
class AllatokMarhaKikerulesRequest extends FormRequest
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
            //

    'kikerules_datuma' => ['required','date',new MarhaKikerulescheck,],   
   
    'kikerules_helye' => ['nullable','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/',], 
  'cel_tenyeszet' => ['required','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/',new MarhaSzarmazastenyeszetcheck,],
      
        ];
    }
}
