<?php

namespace App\Rules\Marha;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Input;
class MarhaDatumJarlatcheck implements Rule
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
    protected $melyik=1;
    public function passes($attribute, $value)
    {
        //
              $data=Input::all();// a data-ban van a teljes adat
          //print_r($data);
        $bekerult=$this->Sbol_szam($data['bekerult']);
        $szuletes=$this->Sbol_szam($data['szuletes_datuma']);
         $jarlat=$this->Sbol_szam($data['jarlat_kiadasa']);
        if($szuletes>$jarlat)
        {
            //echo'A kikerules:'.$kikerult.'  a bekerules:'.$bekerult;exit;
            $this->melyik=1;
            return false;
        }
        if($bekerult>$jarlat)
        {
            //echo'A kikerules:'.$kikerult.'  a bekerules:'.$bekerult;exit;
            $this->melyik=1;
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
        if($this->melyik==1)
            return'A járlat kiadása kisebb mint a születés dátuma';
         if($this->melyik==2)
            return'A járlat kiadása kisebb mint a bekerülés dátuma';
        return 'A járlat dátuma nem megfelelő!';
    }

/**
 * �talakitjuk a datumot szaama akkor is ha pl ilyen 2016.5.1 vagy 2016.5.10
 * vagy 2015.10.1

 * @return number
 */
public function Sbol_szam($date)
{
    //echo'<br>'.' a bekuldott date :'.$date;
    if(strlen($date)!=10)
    {
        //echo'<br>'.' a bekuldott date :'.$date.'   a strlen :'.strlen($date).'   a nulla ment vissza';
        
        return 0;
    }

    $ev=substr($date, 0,4);
    $honap=substr($date, 5,2);
    $nap=substr($date, 8,2);
//  echo '<br>'.'  ev :'.$ev.'   ho:'.$honap.'   nap:'.$nap;
    $ossznap=((integer)$ev*365);
    $ho_nap=0;


    if($honap=='01') $ho_nap=0;
    if($honap=='02') $ho_nap=31;//
    if($honap=='03') $ho_nap=59;//31+28
    if($honap=='04') $ho_nap=90;//31/29+31
    if($honap=='05') $ho_nap=120;//90+30
    if($honap=='06') $ho_nap=151;//120+31
    if($honap=='07') $ho_nap=181;//151+30
    if($honap=='08') $ho_nap=212;//181+31
    if($honap=='09') $ho_nap=243;//212+31
    if($honap=='10') $ho_nap=273;//243+30
    if($honap=='11') $ho_nap=304;//273+31
    if($honap=='12') $ho_nap=334;//304+30
    $ossznap=$ossznap+$ho_nap;// hozz�adtuk a h�napokat
    //echo '<br>'.'  osszszam a hoval :'.$ossznap.'    a honap:'.$ho_nap;
    $ossznap=$ossznap+$nap;// hozz�adtuk a napokat
    // ennyi most a szoveg napokban
    //System.out.println("Az utilsban bej�tt �v : "+szoveg+"  visszaadott : "+ossznap);
    //echo '<br>'.' a bekuldott date :'.$date.'  visszaadott szam :'.$ossznap;
    return $ossznap;
}


//***************************************************************
}
