<?php

namespace App\Rules\Marha;

use Illuminate\Contracts\Validation\Rule;
use App\AllatokMarha;
use Illuminate\Support\Facades\DB;
class Enarszam_check implements Rule
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
   

$tablaban = DB::table('allatok_marhas')->where('enarszam',$value)->value('kikerules');
    if(isset($tablaban))
    {
       
       return $tablaban;
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
        return 'Ez az Enarszám jelenleg aktív!';
    }
}
