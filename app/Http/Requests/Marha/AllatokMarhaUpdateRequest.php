<?php

namespace App\Http\Requests\Marha;

use Illuminate\Foundation\Http\FormRequest;
use  App\Controllers\Marha\AllatokMarhaController;
use  Illuminate\Validation\Rule;
use App\Rules\Marha\MarhaDatumelhullascheck;
use App\Rules\Marha\MarhaDatumSajatvagascheck;
use App\Rules\Marha\MarhaDatumBekerultcheck;
use App\Rules\Marha\MarhaDatumJarlatcheck;
use App\Http\Requests\Requests;
use Illuminate\Http\Request;
use App\AllatokMarha;
use Illuminate\Support\Facades\Input;

class AllatokMarhaUpdateRequest extends FormRequest
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
        
        //echo'<br>Elotte a rulesbe-be bekuldott adat';
         //$valami=Input::all();
         //$AllatokMarha=$valami['AllatokMarha'];
      /*
      print_r($AllatokMarha);
      echo'<br><br>Utana<br><br>';

      echo'<br><br>Utana<br><br>';exit;
      */
   
        /*
 print_r($AllatokMarha);
      echo'<br><br>Utana<br><br>';

      echo'<br><br>Utana<br><br>';exit;
      */

       return [
    // 'enarszam' =>['bail','required','regex:/^[0-9]/','between:10,10',], 
     'neve' => ['required','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_]+$/',],
    
    'neme' => ['required',Rule::in(['noivaru', 'himivaru']),],
    'szuletes_datuma' => 'required|date',
    'bekerult' => ['required','date',new MarhaDatumBekerultcheck,],
    'fajta' => ['required',Rule::in(['magyartarka', 'limousin', 'lapaly', 'feher_kek', 'hereford', 'hersey', 'magyarszurke', 'egyebbhushasznu','nullable',]),],

    'szine' => ['required',Rule::in(['vorostarka', 'feketetarka', 'zsemletarka', 'fekete', 'voros', 'feketevoros', 'egyebbtarka', 'egyebb','nullable',]),
    ],
    'anya_enarszam' => ['required','regex:/^[0-9]/','between:10,10','different:enarszam',], 

    'anya_neve' =>['required','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_]+$/',],

    'jarlat_sorszam' =>['required','max:100','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_]+$/'],

    'jarlat_kiadasa' => ['required','date',new MarhaDatumJarlatcheck,],

    'szarmazas_tenyeszet' => ['required','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_]+$/'],


  
  
  ];  
      
   
      
    }
}
