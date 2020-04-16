<?php

use Illuminate\Support\Facades\Route;
use App\Personal;

// Rutas Auth
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('/create-personal', 'PersonalController@index');
Route::post('/create-personal/create', 'PersonalController@create')->name('create-personal');
Route::get('/view-personal', 'PersonalController@view_all')->name('view-personal-all');

Route::get('/view', function () { return view('view'); });

Route::get('/view/{id}', function ($id) {

    $personal = Personal::find($id);
    return view('view-personal', ['personal' => $personal]);

})->name('view');

Route::get('/view-qr/{id}', function ($id) {

    $personal = Personal::where('identificacion', 'like', $id)->get();
    return ['personal' => $personal];

});



