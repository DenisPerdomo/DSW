<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
//*************EJERCICIO 1************//
Route::get('/', function () {
    return "Pantalla principal";
});

Route::get('auth/login', function () {
    return "Login usuario";
});
Route::get('auth/logout', function () {
    return "Logout usuario";
});

Route::get('catalog', function () {
    return "Listado de clientes";
});

Route::get('catalog/show/{id}', function ($id) {
    return "Detalles del cliente ".$id;
});

Route::get('catalog/create', function () {
    return "Alta de un cliente";
});

Route::get('catalog/edit/{id}', function ($id) {
    return "Modifica los datos del cliente ".$id;
});

Route::get('catalog/delete/{id}', function ($id) {
    return "Elimina los datos del cliente ".$id;
});
//*************EJERCICIO 1************//
//*************EJERCICIO 2***********//
    //*************Apartado 1 y 2***********//
    Route::get('opcional/{param?}', function ($param = 'Defecto') {
        if (isset($param)) {
            return "Hay parámetro opcional: $param";
        } else {
            return "No hay parámetro opcional";
        }
    });
    //*************Apartado 1 y 2***********//
    //*************Apartado 3***********//
    Route::post('porpost', function () {
        return 'Ruta por post';
    });
    //*************Apartado 3***********//
    //*************Apartado 4***********//
    Route::match(['get', 'post'], 'porgetypost', function () {
        return 'Ruta por get o post.';
    });
    //*************Apartado 4***********//
    //*************Apartado 5***********//
    Route::get('catalog/show/{id}', function ($id) {
        return "Ruta que comprueba que el parámetro sea un número: ".$id;
    })->where('id', '[0-9]+');
    //*************Apartado 5***********//
    //*************Apartado 6***********//
    Route::get('catalog/{id}/{text}', function ($id, $text) {
        return "Primero parametro id(sólo números): ".$id.
        "<br>Segundo Parametro text (sólo texto): ".$text;
    })->where(['id' => '[0-9]+', 'text' => '[a-z]+']);
    //*************Apartado 6***********//
//*************EJERCICIO 2***********//
