<?php

namespace App\Http\Requests\Marha;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Marha\MarhaDatumelhullascheck;
class AllatokMarhaElhullasRequest extends FormRequest
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
        //0return[];

        return [
            //

    'elhullas_datuma' => ['required','date',new MarhaDatumelhullascheck,],   
        ];
        
    }
}
