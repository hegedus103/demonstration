<?php

namespace App\Http\Controllers\Marha;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Auth;
use App\AllatokMarha;
use App\Http\Requests\Marha\AllatokMarhaKikerulesRequest;

class MarhakikerulesController extends Controller
{
    //
          protected $redirectTo = '/home';
           public function __construct()
    {
       $this->middleware('auth');
       $this->middleware(MarhakikerulesMiddleware::class)->only('kikerules');
        //$this->middleware('guest')->except('logout');
    }
//**********************************************************************


//***********************************************************
public function show()
{
   Alert::info('Értesítés', 'A MarhaKikerulesShowban van!');
    return view('home');
} 
//***********************************************************************
     public function index()
    {
    	/*
     $kiiras_neve = 'Kikerült marha adatok';
   Alert::info('Értesítés', 'Sikerült a gomblenyomas!');
$marha_adatok = DB::select('SELECT * FROM az_allatok_marhas where kikerules = ?',[1]);
     
   //$marha_adatok = DB::table('allatok_marhas')->where('kikerules', '1');
     //print_r($marha_adatok);exit;
    return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);
      */
     return view('home');
    }
//******************************************************************
public function edit($id)
{

	//Alert::info('Értesítés az id', $id);
  
//$marha_adat = DB::select('SELECT * FROM az_allatok_marhas where id = ?',[$id]);
    $AllatokMarha=AllatokMarha::find($id);
    //print_r($AllatokMarha);exit;
$kikerulesi_helyek=DB::table('allatok_marhas')->pluck('kikerules_helye')->unique();
//$kikerules_helyek=DB::table('allatok_marhas')->select('kikerules_helye');
/*
if(isset($kikerulesi_helyek))
{
  echo'A lekert kikerulesi Helyek:';
  print_r($kikerulesi_helyek);exit;
}
else
{
  echo'Nem talaltam kikerulesihelyeket';exit;
}
*/
   return view('sajat.madatok_modositasa.marha_kikerules_modositas_main')->with('AllatokMarha', $AllatokMarha)->with('kikerulesi_helyek',$kikerulesi_helyek);
   

   //return view('home');

}
//****************************************************************
public function kikerules_visszavonasa($id)
{
    if(!Auth::check())
        {
          Alert::info('Értesítés', 'Még nem vagy belépve!');
          return view('home');
        }
    $AllatokMarha=AllatokMarha::find($id);
    $AllatokMarha->kikerules=false;
    $AllatokMarha->kikerules_datuma='1000-01-01';
    $AllatokMarha->kikerules_helye='';
    $AllatokMarha->cel_tenyeszet='';
    $AllatokMarha->save();
    Alert::info('Értesítés','Sikerült a kikerülés visszavonása');
   return view('home');

}
//******************************************************************
public function update(AllatokMarhaKikerulesRequest $AllatokMarha,$id)
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
        $AllatokMarha_lekerve->kikerules=true;
        $AllatokMarha_lekerve->kikerules_datuma=$AllatokMarha['kikerules_datuma'];
        $AllatokMarha_lekerve->kikerules_helye=$AllatokMarha['kikerules_helye'];
        $AllatokMarha_lekerve->cel_tenyeszet=$AllatokMarha['cel_tenyeszet'];
   
   
  

 //print_r($AllatokMarha_lekerve);exit;
  //$AllatokMarha->save();
   $AllatokMarha_lekerve->save();
  Alert::info('Értesítés','Sikerült az adatmódosítás');
  
   
   return view('home');
}



//******************************************************************     
}// vege a class-nak
