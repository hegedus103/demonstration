<?php

namespace App\Http\Controllers\Marha;
use Illuminate\Database\Query\Builder;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Marha\AllatokMarhaUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\AllatokMarha;
use App\Http\Middleware\Marha\MarhadisplayMiddleware;
use App\Events\MarhaMegjelenitesRadiok;
use Alert;
use Auth;
use App\User;

class MarhadisplayController extends Controller
{
    //
         protected $redirectTo = '/home';
         //protected $user_id='';
           public function __construct()
    {
       $this->middleware('auth');
       $this->middleware(MarhadisplayMiddleware::class)->only('update');
        //$this->middleware('guest')->except('logout');
         //$user = User::find(Auth::user());
       //$this->user_id=$user['ID'];
       //$this->user_id=auth()->user()->id;
       //Alert::info('Értesítés', 'A lekert user id:!'.$this->user_id);
    }
    
    public function index()
    {
     
        //
   //Alert::info('marhadisplaycontroller', 'az indexbol jon!');
  //$marha_adatok = DB::select('SELECT * FROM az_allatok_marhas where ((kikerules = ?) and (elhullas = ?) and (sajat_vagas = ?))',[false,false,false]);
   // $user = User::find(Auth::user());
     $user_id=auth()->user()->id;
     //$user_id=auth()->user()->tenyeszetkod;
    //print_r($user_id);exit;
    //$user_id=$user['id'];
   
$marha_adatok=AllatokMarha::where('user_id','=',$user_id)->where('kikerules','=',false)->where('sajat_vagas','=',false)->where('elhullas','=',false)->paginate(10);

  $kiiras_neve = 'Meglevo marha adatok';
 //$marha_adatok = DB::table('allatok_marhas')->where('kikerules','=','0')->where('elhullas','=' ,'0')->where('sajat_vagas','=','0');
   return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);

    }
      //return view('sajat.marhaadatok.adatbevitel');
 	 //****************************************************************

   public function meglevo_marha( )
{
  //Alert::info('Értesítés', 'Sikerült a gomblenyomas!');
  //$marha_adatok = DB::select('SELECT * FROM az_allatok_marhas where ((kikerules = ?) and (elhullas = ?) and (sajat_vagas = ?))',[false,false,false]);
   $user_id=auth()->user()->id;
  $marha_adatok=AllatokMarha::where('user_id','=',$user_id)->where('kikerules','=',false)->where('sajat_vagas','=',false)->where('elhullas','=',false)->paginate(10);



  $kiiras_neve = 'Meglevo marha adatok';


   return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);
}
//********************************************************************

public function kikerult_marha( )
{
   // event(new MarhaMegjelenitesRadiok());
    $kiiras_neve = 'Kikerült marha adatok';
  //Alert::info('Értesítés', 'Sikerült a gomblenyomas! a kikerult marha ban');
     $user_id=auth()->user()->id;
   $marha_adatok=AllatokMarha::where('user_id','=',$user_id)->where('kikerules','=',true)->paginate(10);
   
    return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);
   
}
//***************************************************************************
public function elhullott_marha( )
{
    $kiiras_neve = 'Elhullott marha adatok';
   //Alert::info('Értesítés', 'Sikerült a gomblenyomas!');
   $user_id=auth()->user()->id;
     $marha_adatok=AllatokMarha::where('user_id','=',$user_id)->where('elhullas','=',true)->paginate(10);
     
    return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);
   
}
//***************************************************************************
public function sajat_vagas_marha( )
{
    $kiiras_neve = 'Sajat vagas marha adatok';
   //Alert::info('Értesítés', 'Sikerült a gomblenyomas!');
      $user_id=auth()->user()->id;
    $marha_adatok=AllatokMarha::where('user_id','=',$user_id)->where('sajat_vagas','=',true)->paginate(10);
    
     
    return view('sajat.marhaadatok_display.marha_adatkiiras')->with('marha_adatok', $marha_adatok)->with('kiiras_neve', $kiiras_neve);
   
}
//******************************************************************
public function edit($id)
{
 
//Alert::info('Értesítés', 'Sikerült a gomblenyomas a MarhadisplayController editben vagy!');
   return view('home');
}
//******************************************************************
public function update(AllatokMarhaUpdateRequest $AllatokMarha,$id)
{
   //Alert::info('Értesítés', 'Sikerült a gomblenyomas a MarhadisplayController update vagy!');
   return view('home');
}
//**********************************************************************
public function show()
{
//Alert::info('Értesítés', 'Sikerült a gomblenyomas a MarhadisplayController showban vagy!');
  return view('home');
}
//*******************************************************************


//*******************************************************************
}
