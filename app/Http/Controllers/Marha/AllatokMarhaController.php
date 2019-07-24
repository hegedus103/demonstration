<?php

namespace App\Http\Controllers\Marha;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Marha\AllatokMarhaRequest;
use App\Http\Requests\Marha\AllatokMarhaUpdateRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\AllatokMarha;
use Auth;
use Alert;
use Carbon\carbon;
use App\Rules\Enarszam_check;
use App\Rules\Marha\MarhaDatumBekerultcheck;
use App\Rules\Marha\MarhaDatumJarlatcheck;
use Illuminate\Support\Facades\DB;

class AllatokMarhaController extends Controller
{
    //
  
        protected $redirectTo = '/home';
           public function __construct()
    {
       $this->middleware('auth');
        //$this->middleware('guest')->except('logout');
    }
    
    public function index()
    {
        //
       $tenyeszetkod=auth()->user()->tenyeszetkod;
      return view('sajat.marhaadatok.adatbevitel')->with('tenyeszetkod', $tenyeszetkod);
 	} 
//**********************************************************************
// esetleges hianyzo adatokanak ertekadas
 public function elokeszites(array $data)
 {

   // print_r($data);exit;
    $marha=new AllatokMarha;
      if(isset($data['enarszam']))
      {
        $marha['enarszam']= $data['enarszam'];
      }
      else
      {
      $marha['enarszam'] = '9999999999';
      }
      if(isset($data['neve']))
      {
        $marha['neve']= $data['neve'];
      }
      else
      {
      $marha['neve']=$marha['enarszam'];
      }
      if(isset($data['neme']))
      {
        $marha['neme']= $data['neme'];
      }
      else
      {
      $marha['neme']='nincs megadva';
      }
      if(isset($data['szuletes_datuma']))
      {
        $marha['szuletes_datuma']= $data['szuletes_datuma'];
      }
      else
      {
        $date = Carbon::now();
      $marha['szuletes_datuma']=$date->format("Y-M-D");
      }
        if(isset($data['bekerult']))
      {
        $marha['bekerult']= $data['bekerult'];
      }
      else
      {
        $date = Carbon::now();
      $marha['bekerult']=$date->format("Y-M-D");
      }
        if(isset($data['fajta']))
      {
        $marha['fajta']= $data['fajta'];
      }
      else
      {
      $marha['fajta']='magyartarka';
      }
    if(isset($data['szine']))
      {
        $marha['szine']= $data['szine'];
      }
      else
      {
      $marha['szine']='vorostarka';
      }


        if(isset($data['anya_enarszam']))
      {
        $marha['anya_enarszam']= $data['anya_enarszam'];
      }
      else
      {
      $marha['anya_enarszam']='0000000000';
      }
        if(isset($data['anya_neve']))
      {
        $marha['anya_neve']= $data['anya_neve'];
      }
      else
      {
      $marha['anya_neve']=$marha['anya_enarszam'];
      }
   
        if(isset($data['jarlat_sorszam']))
      {
        $marha['jarlat_sorszam']= $data['jarlat_sorszam'];
      }
      else
      {
      $marha['jarlat_sorszam']='000';
      }
          if(isset($data['jarlat_kiadasa']))
      {
        $marha['jarlat_kiadasa']= $data['jarlat_kiadasa'];
      }
      else
      {
        
      $marha['jarlat_kiadasa']='1000-01-01';
      }
      if(isset($data['szarmazas_tenyeszet']))
      {
        $marha['szarmazas_tenyeszet']= $data['szarmazas_tenyeszet'];
      }
      else
      {
        
      $marha['szarmazas_tenyeszet']='';
      }
      // elhatarozva hogy a 1000-01-01 lesz a defult datum
     // ezeknek kezdeti erteket kell adni
      $marha['kikerules']=false;
      $marha['kikerules_datuma']='1000-01-01';
      $marha['kikerules_helye']='';
      $marha['cel_tenyeszet']= '';

      $marha['elhullas']=false;
      $marha['elhullas_datuma']='1000-01-01';
    
      $marha['sajat_vagas']=false;
      $marha['sajat_vagas_datuma']='1000-01-01';
    
  
      if(isset($data['user_id']))
      {
        $marha['user_id']= $data['user_id'];
      }
      else
      {
        
      $marha['user_id']=auth()->user()->id;
      }
     // print_r($marha);exit;
      return  $marha;
 } 

//*******************************************************************
   public function create(array $data)
    {

        $marha=$this->elokeszites($data);
        //$marha=$data;
       // echo'a create elott vagyok';exit;
        $user = AllatokMarha::create([
        	'enarszam' => $marha['enarszam'],
            'neve' => $marha['neve'],
            'neme' => $marha['neme'],
            'szuletes_datuma' => $marha['szuletes_datuma'],
            'bekerult' => $marha['bekerult'],
            'fajta' => $marha['fajta'],
            'szine' => $marha['szine'],
            'anya_enarszam' => $marha['anya_enarszam'],
            'anya_neve' => $marha['anya_neve'],
           'jarlat_sorszam' => $marha['jarlat_sorszam'],
           'jarlat_kiadasa' => $marha['jarlat_kiadasa'],
            'szarmazas_tenyeszet' => $marha['szarmazas_tenyeszet'],
            'kikerules' => $marha['kikerules'],
            'kikerules_datuma' => $marha['kikerules_datuma'],
            'kikerules_helye' => $marha['kikerules_helye'],
            'cel_tenyeszet' => $marha['cel_tenyeszet'],
            'elhullas' => $marha['elhullas'],
            'elhullas_datuma' => $marha['elhullas_datuma'],
            'elhullas' => $marha['elhullas'],
            'elhullas_datuma' => $marha['elhullas_datuma'],
            'sajat_vagas' => $marha['sajat_vagas'],
            'sajat_vagas_datuma' => $marha['sajat_vagas_datuma'],
            'user_id' => $marha['user_id'],
        ]);
        
       /* $user->notify(new UserActivate($user));*/
        return $user; 
    }
    //
    //-----------------------------------------------------------
      
      public function store(AllatokMarhaRequest $request)
    {
  
 	//	Alert::info('Értesítés', 'A store auth ceheck elott!');
       //return response()->json([$request->all()]);
        if(Auth::check())
        {
            try
        {
        	
        $adat=$this->create($request->all());
     
      
      	if($adat)
      	{
      		  //Session::flash('flash_message', 'Sikerult a create!');
          //Alert::info('Értesítés', 'Sikerült az adatbevitel!');
      		//return redirect()->route('home');
          http_response_code(200); 
          return response()->json(['error'=>false],200);

      	}
      	else
      	{
      		// Session::flash('flash_message', 'Nem Ssikerult a create!');
            //Alert::info('Értesítés', 'Sikertelen az adatbevitel!');
          //return redirect()->route('home');
           http_response_code(200); 
        return response()->json(['error'=>true,'message' =>'Az adatbevitel nem sikerült!'],200);
 
      		 
      	}

      }
      catch(Exception $e)
      {
      	 Alert::info('Értesítés', 'Exceptiont dobott a marhaadatbevitel_auth_check!');
      	report($e);
      }

 		}


 	
 		//Session::flash('flash_message', 'Nem sikerult a create!');
           // Alert::info('Értesítés', 'Ön nincs belépve!');
         // return redirect()->route('home');
         http_response_code(200); 
        return response()->json(['error'=>true,'message' =>'Ön nincsen belépve!'],200);
 
   
    }

//***********************************************************
public function update($id,AllatokMarhaUpdateRequest $AllatokMarha)
{
  //$valid=$this->updatecheck($AllatokMarha);
  /*
      echo'<br>Elotte a controler.update-be bekuldott adat';
      print_r($AllatokMarha->all());
    echo'<br><br>Utana<br><br>';
    */
      
    if(!Auth::check())
        {
                      http_response_code(200); 
          return response()->json(['error'=>true,'message'=>'Ön nincs belépve!',],200);
 
        }
   
        try
        {
        $AllatokMarha_lekerve=AllatokMarha::find($id);
        //echo'<br>Elotte a tablabol lekert adat adat';
       // print_r($AllatokMarha_lekerve);
        //echo'<br><br>Utana<br><br>';
        //$AllatokMarha_lekerve->enarszam=$AllatokMarha['enarszam'];
        $AllatokMarha_lekerve['neve'] = $AllatokMarha['neve'];
        $AllatokMarha_lekerve['neme'] = $AllatokMarha['neme'];
        $AllatokMarha_lekerve->szuletes_datuma=$AllatokMarha['szuletes_datuma'];
        $AllatokMarha_lekerve->bekerult=$AllatokMarha['bekerult'];
        $AllatokMarha_lekerve->fajta=$AllatokMarha['fajta'];
        $AllatokMarha_lekerve->szine=$AllatokMarha['szine'];
        $AllatokMarha_lekerve->anya_enarszam=$AllatokMarha['anya_enarszam'];
        $AllatokMarha_lekerve->anya_neve=$AllatokMarha['anya_neve'];
        $AllatokMarha_lekerve->jarlat_sorszam=$AllatokMarha['jarlat_sorszam'];
        $AllatokMarha_lekerve->jarlat_kiadasa=$AllatokMarha['jarlat_kiadasa'];
        $AllatokMarha_lekerve->szarmazas_tenyeszet=$AllatokMarha['szarmazas_tenyeszet'];
    
   
        }
        catch(Exceptiont $exp)
        {
             http_response_code(200); 
          return response()->json(['error'=>true,'message'=>$exp->getMessage(),],200);
        }
 //print_r($AllatokMarha_lekerve);exit;
  //$AllatokMarha->save();

   $AllatokMarha_lekerve->save();
  //Alert::info('Értesítés','Sikerült az adatmódosítás');
  
        http_response_code(200); 
          return response()->json(['error'=>false],200);
 
}
//-********************************************************
/*A meglevo_marha.blade bol az update lehetoseg hivja meg
*/
public function get_edit($id)
{

  $AllatokMarha=AllatokMarha::find($id);
   return view('sajat.vue_dialog.torzs_bevitel.torzs_update_vue')->with('AllatokMarha', $AllatokMarha)->with('id', $id);

}
//**********************************************************
public function edit($id)
{

    //Alert::info('Értesítés', 'Az editbol jon a z alert!'.$id);
    $AllatokMarha=AllatokMarha::find($id);
 
   
  return response()->json([$AllatokMarha]);
   //return response()->json(['lekeres' =>'adatok']);
   //return view('home');
}
//***************************************************************
public function destroy($id)
{
   if(!Auth::check())
        {
          Alert::info('Értesítés', 'Még nem vagy belépve!');
          return view('home');
        }
        $AllatokMarha=AllatokMarha::find($id);
        $AllatokMarha->delete();
        Alert::info('Értesítés', 'Sikerült az adattörlés!');
         // \Session::flash('flash_message_delete','Office successfully deleted.');
        return;
       //return view('home');  
} 
//***********************************************************
public function show($id)
{
   //Alert::info('Értesítés az id:'.$id, 'Bejott az AllatokMarhaController show-ba!');
    $this->destroy($id);

  return view('home');
 //************************************************************   
}
}
?>
