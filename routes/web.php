<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//incorrecto debo hacer la vista con un controlador porque debe ejecutar instantaneamente el metodo index para ver productos
Route::view('inventario','inventario.index')->name('inventario.index');

Route::