<?php
use App\tbl_pages;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('activate/{token}', 'Auth\RegisterController@activate')
    ->name('activate');
Route::post('activate/{token}', 'Auth\RegisterController@create')
    ->name('activate');
Route::get('munkaasztal','munkasztalController@index')->name('munkaasztal');
Route::get('belepes','belepesController@show');
Route::view('belepes', 'belepes');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//**********************************************************
 Route::get('menu','MenuController@index')->name('mainNav');

 //**************************************************************
 //                 Torzsadatok kezelese
 //      Ezt a AllatokMarhaController kezeli 

 Route::get('marha_torzs_bevitel', '\App\Http\Controllers\Marha\AllatokMarhaController@index')->name('marha_torzs_bevitel');
//----------------------------------------
 Route::get('marha_torzs_bevitel_vue', function () {
    return view('sajat.vue_dialog.torzs_bevitel.torzs_bevitel_vue');
})->name('marha_torzs_bevitel_vue');
 Route::get('marha_torzs_update_vue/{id}', function () {
    return view('sajat.vue_dialog.torzs_bevitel.torzs_update_vue');
})->name('marha_torzs_update_vue');
 Route::get('marha_torzs_get_edit/{id}','\App\Http\Controllers\Marha\AllatokMarhaController@get_edit')->name('marha_torzs_get_edit');

 //-----------------------------------
 Route::post('marha_torzs_create', '\App\Http\Controllers\Marha\AllatokMarhaController@store')->name('marha_torzs_create');
Route::get('marha_torzs_edit/{id}','\App\Http\Controllers\Marha\AllatokMarhaController@edit')->name('marha_torzs_edit');
Route::put('marha_torzs_update/{id}{AllatokMarha}','\App\Http\Controllers\Marha\AllatokMarhaController@update')->name('marha_torzs_update');
Route::get('marha_torzs_delete/{id}','\App\Http\Controllers\Marha\AllatokMarhaController@show')->name('marha_torzs_delete');
Route::resource('marha_torzs_adatok', '\App\Http\Controllers\Marha\AllatokMarhaController', [
    'names' => [
        'index' => 'marha_torzs_bevitel',
        'store' => 'marha_torzs_create',
        'edit' => 'marha_torzs_edit',
        'update' => 'marha_torzs_update',
        'show' => 'marha_torzs_delete',
       
    ]
]);

//**********************************************************************

//              A képernyőre kikerülés
// Ezt a MarhadisplayController kezeli 

//Route::get('meglevo_marha','\App\Http\Controllers\Marha\MarhadisplayMeglevoController@index')->name('meglevo_marha');

Route::get('meglevo_marha','\App\Http\Controllers\Marha\MarhadisplayController@meglevo_marha')->name('meglevo_marha');
Route::get('kikerult_marha','\App\Http\Controllers\Marha\MarhadisplayController@kikerult_marha')->name('kikerult_marha');
Route::get('elhullott_marha','\App\Http\Controllers\Marha\MarhadisplayController@elhullott_marha')->name('elhullott_marha');
Route::get('sajat_vagas_marha','\App\Http\Controllers\Marha\MarhadisplayController@sajat_vagas_marha')->name('sajat_vagas_marha');
Route::get('index','\App\Http\Controllers\Marha\MarhadisplayController@index')->name('marha_display');

Route::resource('marha_kepernyore', '\App\Http\Controllers\Marha\MarhadisplayController', [
    'names' => [
        'index' => 'marha_display',
        'meglevo_marha' => 'meglevo_marha',
        'kikerult_marha' => 'kikerult_marha',
        'elhullott_marha' => 'elhullott_marha',
        'sajat_vagas_marha' => 'sajat_vagas_marha',
    ]
]);


//***************************************************************
//                    kikerules modositas
//    Ezt a  MarhakikerulesController kezeli

Route::get('kikerules_marha_edit/{id}','\App\Http\Controllers\Marha\MarhakikerulesController@edit')->name('kikerules_marha_edit');
Route::put('kikerules_marha_update/{AllatokMarha}{id}','\App\Http\Controllers\Marha\MarhakikerulesController@update')->name('kikerules_marha_update');
Route::get('kikerules_visszavonasa/{id}','\App\Http\Controllers\Marha\MarhakikerulesController@kikerules_visszavonasa')->name('kikerules_visszavonasa');

Route::resource('marha_kikerules', '\App\Http\Controllers\Marha\MarhakikerulesController', [
    'names' => [

        
        'edit' => 'kikerules_marha_edit',
        'update' => 'kikerules_marha_update',
        'kikerules_visszavonasa' => 'kikerules_visszavonasa',

    ]
]);
//*******************************************************************
//                   Elhullas modositas
//          Ezt a MarhaelhullasController kezeli

Route::get('elhullas_marha_edit/{id}','\App\Http\Controllers\Marha\MarhaelhullasController@edit')->name('elhullas_marha_edit');
Route::put('elhullas_marha_update/{AllatokMarha}{id}','\App\Http\Controllers\Marha\MarhaelhullasController@update')->name('elhullas_marha_update');
Route::get('elhullas_visszavonasa/{id}','\App\Http\Controllers\Marha\MarhaelhullasController@elhullas_visszavonasa')->name('elhullas_visszavonasa');

Route::resource('marha_elhullas', '\App\Http\Controllers\Marha\MarhaelhullasController', [
    'names' => [
        'edit' => 'elhullas_marha_edit',
        'update' => 'elhullas_marha_update',
        'elhullas_visszavonasa' => 'elhullas_visszavonasa',
    ]
]);
//*******************************************************************
//                   Sajat vagas modositas
//          Ezt a MarhasajatvagasController kezeli

Route::get('sajat_vagas_marha_edit/{id}','\App\Http\Controllers\Marha\MarhasajatvagasController@edit')->name('sajat_vagas_marha_edit');
Route::put('sajat_vagas_marha_update/{AllatokMarha}{id}','\App\Http\Controllers\Marha\MarhasajatvagasController@update')->name('sajat_vagas_marha_update');
Route::get('sajat_vagas_visszavonasa/{id}','\App\Http\Controllers\Marha\MarhasajatvagasController@sajat_vagas_visszavonasa')->name('sajat_vagas_visszavonasa');

Route::resource('marha_sajat_vagas', '\App\Http\Controllers\Marha\MarhasajatvagasController', [
    'names' => [
        'edit' => 'sajat_vagas_marha_edit',
        'update' => 'sajat_vagas_marha_update',
        'sajat_vagas_visszavonasa' => 'sajat_vagas_visszavonasa',
    ]
]);


//********************************************************************

Route::get('/', function () {
    return view('belepes');
});

/*
Route::get('/', function () {
    return view('welcome');
});
*/