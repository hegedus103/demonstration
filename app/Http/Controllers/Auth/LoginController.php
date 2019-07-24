<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Alert;
use App\User;
use App\Http\Controllers\ShowBelepve;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // protected $redirectTo = 'munkaasztal';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     protected function credentials(Request $request)
    {
        $field = $this->field($request);
        
        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password'),
           // 'active' => User::ACTIVE,
            'active' => 1,
        ];
    }
public function field(Request $request)
    {
        $email = $this->username();

        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
    }
    
    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);
       
        $messages = ["{$this->username()}.exists" => 'The account you are trying to login is not activated or it has been disabled.'];
    
        $this->validate($request, [
            $this->username() => "required|exists:users,{$field},active," . User::ACTIVE,
            'password' => 'required',
        ], $messages);
 
    

//**********************************************************************
  /*
  function logout() {
        Alert::info('Értesítés', 'Kilpétél a rendszerből!');
        Session::flush(); 
        return Redirect::to('/');
    }
      */   
            //Alert::info('Az eredmeny erteke', $eredmeny);

         
        
    }

}
