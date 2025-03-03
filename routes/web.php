<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Models\Grupo;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//incorrecto debo hacer la vista con un controlador porque debe ejecutar instantaneamente el metodo index para ver productos
Route::view('inventario','inventario.dashboard')->name('inventario.dashboard');

Route::controller(GrupoController::class)->group(function(){
    Route::get('inventario/grupo', 'index')->name('grupo.index');
    Route::get('inventario/grupo/create', 'create')->name('grupo.create');
    Route::post('inventario/grupo', 'store')->name('grupo.store');
    Route::get('inventario/grupo/{grupo}','edit')->name('grupo.edit');
    Route::put('inventario/grupo/{grupo}', 'update' )->name('grupo.update');
    Route::delete('inventario/grupo/{grupo}', 'destroy')->name('grupo.destroy');


});

Route::controller(CategoriaController::class)->group(function(){
    Route::get('inventario/categoria', 'index')->name('categoria.index');
    Route::get('inventario/categoria/create', 'create')->name('categoria.create');
    Route::post('inventario/categoria', 'store')->name('categoria.store');
    Route::get('inventario/categoria/{categoria}/edit', 'edit')->name('categoria.edit');
    Route::put('inventario/categoria/{categoria}', 'update')->name('categoria.update');//lugar donde se procesara la actualizacion , es aca donde tengo la colleccion, pasamos la referencia
    Route::delete('inventario/categoria/{categoria}', 'destroy')->name('categoria.destroy');
    
});


Route::controller(ArticuloController::class)->group(function(){
    Route::get('inventario/articulo', 'index')->name('articulo.index');
    Route::get('inventario/articulo/create', 'create')->name('articulo.create');
    Route::post('inventario/articulo', 'store')->name('articulo.store');
    Route::get('inventario/articulo/{articulo}/edit', 'edit')->name('articulo.edit');
    Route::put('inventario/articulo/{articulo}', 'update')->name('articulo.update');
    Route::delete('inventario/articulo/{articulo}', 'destroy')->name('articulo.destroy');
});
