<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Personal;
use App\Control_ingreso;

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
Route::get('/control/funcionarios', 'ControlIngresoController@funcionarios')->name('funcionarios');
Route::get('/control/clientes', 'ControlIngresoController@clientes')->name('clientes');
Route::post('/control/create', 'ControlIngresoController@create');
Route::get('/control/create/search/{id}', 'ControlIngresoController@createSearch');
Route::post('/control/registrar', 'ControlIngresoController@registrar');
Route::post('/control/search', 'ControlIngresoController@search');

// Rutas administrador
Route::group(['middleware' => ['permission:universal']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/users', 'AdminController@users')->name('users');
    Route::post('/admin/users/create', 'AdminController@create')->name('users-create');
});

// Ruta administrador personal

Route::group(['middleware' => ['permission:administrador personal|control ingreso|universal']], function () {
    Route::get('/control/funcionarios', 'ControlIngresoController@funcionarios');
    Route::get('/control/clientes', 'ControlIngresoController@clientes');
    Route::get('/control/ver-historial/{id}', 'ControlIngresoController@verHistorial')->name('VerHistorial');
});

// Ruta Control ingreso formulario
Route::get('/Formulariocovid', function () { return view('view-formulario'); });

Route::get('/buscaridentificacion/{id}', function($id) {

    $ingreso = Control_ingreso::where('identificacion','like', $id)->get();
    if($ingreso){

        return ['ingreso'=>$ingreso];
    }
    else{

    }
});

Route::post('/insertar_registro', function(Request $request) {
    Control_ingreso::find($request->post('personal_id'))->update($request->all());
    return redirect()->back()->with('mensaje','Gracias por llenar el formulario');
});


//Rutas codigo qr
Route::get('/view', function () { return view('view'); });

Route::get('/view/{id}', function ($id) {

    $personal = Personal::find($id);
    return view('view-personal', ['personal' => $personal]);

})->name('view');

Route::get('/view-qr/{id}', function ($id) {

    $personal = Personal::where('identificacion', 'like', $id)->get();
    return ['personal' => $personal];

});



