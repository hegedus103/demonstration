<?php

namespace App\Rules\Marha;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
class MarhaSzarmazastenyeszetcheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
         $data=Input::all();//
         $tenyeszetkod='';
         $user = User::find(Auth::user()->id);
            //$user->getAuthPassword();
         
         $tenyeszetkod=$user['tenyeszetkod'];
         //print_r($data);
         //echo'<br>A lekert password:'.$user;
           //echo' A lekert tenyeszetkof:'.$tenyeszetkod;exit;
         if((!empty($data))&&(!empty($tenyeszetkod)))
         {
               if($tenyeszetkod==$data['cel_tenyeszet'])
               return false; 
         }
         
         return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A saját tenyészetébe nem kerülhet ki!';
    }
}
