<?php

namespace App\Http\Requests\Marha;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Validation\Rule;
//use  App\Controllers\AllatokMarhaController;
use App\Rules\Marha\Enarszam_check;
use App\Rules\Marha\MarhaDatumBekerultcheck;
use App\Rules\Marha\MarhaDatumJarlatcheck;
use Illuminate\Validation\ValidationException;
use App\AllatokMarha;
class AllatokMarhaRequest extends FormRequest
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
        //$data(Input::request->all());
        /*
        return [
            'enarszam' =>['bail','required','regex:/^[0-9]/','between:10,10',new Enarszam_check],
            'neve' =>'required',
            'neme' =>'required',
            'szuletes_datuma' =>'required',
            'bekerult' =>'required',
            'fajta' =>'required',
            'szine' =>'required',
            'anya_enarszam' =>'required',
            'anya_neve' =>'required',
            'jarlat_sorszam' =>'required',
            'jarlat_kiadasa' =>'required',
            'szarmazas_tenyeszet' =>'required',
        ];
       //print_r($data);exit;
        */
       return [
           'enarszam' =>['required','regex:/^[0-9]/','between:10,10',new Enarszam_check], 
    'neve' => ['bail','nullable','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/',],
    
    'neme' => ['required',Rule::in(['noivaru', 'himivaru']),],
    'szuletes_datuma' => 'required|date',
    'bekerult' => ['required','date',new MarhaDatumBekerultcheck,],
    'fajta' => ['required',Rule::in(['magyartarka', 'limousin', 'lapaly', 'feher_kek', 'hereford', 'hersey', 'magyarszurke', 'egyebbhushasznu','nullable',]),],

    'szine' => ['required',Rule::in(['vorostarka', 'feketetarka', 'zsemletarka', 'fekete', 'voros', 'feketevoros', 'egyebbtarka', 'egyebb','nullable',]),
    ],
    'anya_enarszam' => ['required','regex:/^[0-9]/','between:10,10','different:enarszam',], 

    'anya_neve' =>['nullable','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/',],

    'jarlat_sorszam' =>['nullable','max:100','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/'],

    'jarlat_kiadasa' => ['required','date',new MarhaDatumJarlatcheck,],

    'szarmazas_tenyeszet' => ['required','max:255','regex:/^[A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+$/',],

   
  ];  
     
   
      


    }// vege a function rules()

//--------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------    

}
