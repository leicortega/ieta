<?php

use Illuminate\Support\Facades\Route;
use App\Personal;

// Rutas Auth
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

// Rutas Personal
Route::get('/create-personal', 'PersonalController@index');
Route::post('/create-personal/create', 'PersonalController@create')->name('create-personal');
Route::post('/update-personal', 'PersonalController@update');
Route::get('/view-personal', 'PersonalController@view_all')->name('view-personal-all');
Route::get('/codeQr/{id}', function ($id) {
    $personal = Personal::find($id);
    return ['qr' => $personal->qr, 'name' => $personal->name];
});

// Rutas Control de ingreso
Route::get('/control/funcionarios', 'ControlIngresoController@funcionarios')->name('control-ingreso');
Route::get('/control/clientes', 'ControlIngresoController@clientes');
Route::post('/control/create', 'ControlIngresoController@create');
Route::post('/control/registrar', 'ControlIngresoController@registrar');
Route::post('/control/search', 'ControlIngresoController@search');

Route::get('/view', function () { return view('view'); });

Route::get('/view/{id}', function ($id) {

    $personal = Personal::find($id);
    return view('view-personal', ['personal' => $personal]);

})->name('view');

Route::get('/view-qr/{id}', function ($id) {

    $personal = Personal::where('identificacion', 'like', $id)->get();
    return ['personal' => $personal];

});



