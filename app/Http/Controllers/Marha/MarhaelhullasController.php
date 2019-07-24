<?php

namespace App\Http\Controllers\Marha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Marha\AllatokMarhaElhullasRequest;
use Alert;
use Auth;
use App\AllatokMarha;
class MarhaelhullasController extends Controller
{
    //
           protected $redirectTo = '/home';
           public function __construct()
    {
       $this->middleware('auth');
     
    }
//***********************************************************
public function show()
{
   Alert::info('Értesítés', 'A MarhaelhullasShowban van!');
    return view('home');
} 
//***********************************************************************
     public function index()
    {
 
     return view('home');
    }

 //******************************************************************
public function edit($id)
{

	//Alert::info('Értesítés az id', $id);
  
//$marha_adat = DB::select('SELECT * FROM az_allatok_marhas where id = ?',[$id]);
    $AllatokMarha=AllatokMarha::find($id);
    //print_r($AllatokMarha);exit;

   return view('sajat.madatok_modositasa.marha_elhullas_modositas_main')->with('AllatokMarha', $AllatokMarha);
   

   //return view('home');
}
//****************************************************************
public function elhullas_visszavonasa($id)
{
    if(!Auth::check())
        {
          Alert::info('Értesítés', 'Még nem vagy belépve!');
          return view('home');
        }
    $AllatokMarha=AllatokMarha::find($id);
    $AllatokMarha->elhullas=false;
    $AllatokMarha->elhullas_datuma='1000-01-01';
  
    $AllatokMarha->save();
    Alert::info('Értesítés','Sikerült az elhullas visszavonása');
   return view('home');

}
//******************************************************************
public function update(AllatokMarhaElhullasRequest $AllatokMarha,$id)
{
  /*
      echo'<br>Elotte a controler.update-be bekuldott adat';
      print_r($AllatokMarha->all());
    echo'<br><br>Utana<br><br>';
    */
    if(!Auth::check())
        {
          Alert::info('Értesítés', 'Még nem vagy belépve!');
          return view('home');
        }
   

        $AllatokMarha_lekerve=AllatokMarha::find($id);
        /*
        echo'<br>Elotte a tablabol lekert adat adat';
       print_r($AllatokMarha_lekerve);
        echo'<br><br>Utana<br><br>';
        */
        //$AllatokMarha_lekerve->enarszam=$AllatokMarha['enarszam'];
    
           // echo'<br>A kikerules else agaban vagyok<br>';
        $AllatokMarha_lekerve->elhullas=true;
        $AllatokMarha_lekerve->elhullas_datuma=$AllatokMarha['elhullas_datuma'];
     
   
  

 //print_r($AllatokMarha_lekerve);exit;
  //$AllatokMarha->save();
   $AllatokMarha_lekerve->save();
  Alert::info('Értesítés','Sikerült az adatmódosítás');
  
   
   return view('home');
}




}// az osztaly vege
