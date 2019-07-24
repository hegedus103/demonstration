<?php

namespace App\Http\Controllers\Marha;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Auth;
use App\AllatokMarha;
use App\Http\Requests\Marha\AllatokMarhaSajatvagasRequest;
class MarhasajatvagasController extends Controller
{
    //
           protected $redirectTo = '/home';
           public function __construct()
    {
       $this->middleware('auth');
       //$this->middleware(MarhakikerulesMiddleware::class)->only('kikerules');
        //$this->middleware('guest')->except('logout');
    }
//****************************************************************************
    public function show()
{
   //Alert::info('Értesítés', 'A MarhaSajatvagasShowban van!');
    return view('home');
} 
//*********************************************************************
   public function index()
    {
  //Alert::info('Értesítés', 'A MarhaSajatvagasindex van!');
     return view('home');
    }
 //******************************************************************
public function edit($id)
{

	//Alert::info('Értesítés az id', $id);
  
//$marha_adat = DB::select('SELECT * FROM az_allatok_marhas where id = ?',[$id]);
    $AllatokMarha=AllatokMarha::find($id);
    //print_r($AllatokMarha);exit;

   return view('sajat.madatok_modositasa.marha_sajat_vagas_modositas_main')->with('AllatokMarha', $AllatokMarha);
   

   //return view('home');
}
//****************************************************************
public function sajat_vagas_visszavonasa($id)
{
    if(!Auth::check())
        {
          Alert::info('Értesítés', 'Még nem vagy belépve!');
          return view('home');
        }
    $AllatokMarha=AllatokMarha::find($id);
    $AllatokMarha->sajat_vagas=false;
    $AllatokMarha->kikerules_datuma='1000-01-01';
   
    $AllatokMarha->save();
    Alert::info('Értesítés','Sikerült a saját vágás visszavonása');
   return view('home');

}
//******************************************************************
public function update(AllatokMarhaSajatvagasRequest $AllatokMarha,$id)
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
        $AllatokMarha_lekerve->sajat_vagas=true;
        $AllatokMarha_lekerve->sajat_vagas_datuma=$AllatokMarha['sajat_vagas_datuma'];
     
   
  

 //print_r($AllatokMarha_lekerve);exit;
  //$AllatokMarha->save();
   $AllatokMarha_lekerve->save();
  Alert::info('Értesítés','Sikerült az adatmódosítás');
  
   
   return view('home');
}


 //**************************************************************************   
}// a class vege
