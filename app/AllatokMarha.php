<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllatokMarha extends Model
{
    //
       // public $table = "allatokmarhas";
		//protected $dateFormat = 'U';
        protected $fillable = [
        'id',
        'enarszam',
        'neve',
        'neme',
        'szuletes_datuma',
        'bekerult',
        'fajta',
        'szine',
        'anya_enarszam',
        'anya_neve',
        'jarlat_sorszam',
        'jarlat_kiadasa',
        'szarmazas_tenyeszet',
        'kikerules',
        'kikerules_datuma',
        'kikerules_helye',
        'cel_tenyeszet',
        'elhullas',
        'elhullas_datuma',
        'sajat_vagas',
        'sajat_vagas_datuma',
        'user_id',
        'created_at',
        'update_at',
    ];

}
