<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use View;
class munkasztalController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
      protected $redirectTo = '/home';
      /*
      Figyelem ezt asort minden fo controlerbe tedd bele  $this->middleware('auth');
      Ekkor ha nincs belepve akkor atiranyitja a belepeshez
      Ha be van lepve akkor a munkasztal oldalra
      Ha bezárja a browsert akkor ujra be kell lépnie!
      */
       public function __construct()
    {
       $this->middleware('auth');
        //$this->middleware('guest')->except('logout');
    }
    public function index()
    {
        //
     //Alert::info('Értesítés', 'Sikerült a belépés!');
     //$this->middleware('auth');
    return view('sajat.munkasztal');
   // return View::make('sajat.munkasztal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
