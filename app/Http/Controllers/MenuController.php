<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lavary\Menus\MenuBuilder;
use Menu;
class MenuController extends Controller
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
      $menu = Menu::get('MyNavBar');
      $menu->home->active();
      return view('home');
 	} 
}
