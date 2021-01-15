<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Rutas Auth
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('index');

// Rutas administrador
Route::group(['middleware' => ['permission:general']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/users', 'AdminController@users')->name('users');
    Route::post('/admin/users/create', 'AdminController@create')->name('users-create');
});

// Rutas para los estudiantes
Route::group(['middleware' => ['permission:general']], function () {
    Route::get('/students', 'EstudiantesController@index');
    Route::post('/students/create', 'EstudiantesController@create');
});

// Rutas para los profesores
Route::group(['middleware' => ['permission:general']], function () {
    Route::get('/teachers', 'ProfesoresController@index');
    Route::post('/teachers/create', 'ProfesoresController@create');
});

// Rutas para los Grados
Route::group(['middleware' => ['permission:general']], function () {
    Route::get('/grados', 'GradosController@index');
    Route::post('/grados/create', 'GradosController@create');
});

// Rutas para las materias
Route::group(['middleware' => ['permission:general']], function () {
    Route::get('/materias', 'MateriasController@index');
    Route::post('/materias/create', 'MateriasController@create');
});
