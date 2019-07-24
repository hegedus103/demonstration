<?php

namespace App\Http\Middleware;

use Closure;
use Menu;
class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  
    public function handle($request, Closure $next)
    {
       
    Menu::make('mainNav', function($m){
    
    $m->add('Marha adatok', ['route'  => 'marha_display']);
    $m->add('Marhamódosítás','adatmodositas');
    //$m->add('Marhatörlés','adattorles'); 
    //$m->add('Adatok képernyőre', ['route'  => 'marha_display']); 
        });

        return $next($request);
    }
}
