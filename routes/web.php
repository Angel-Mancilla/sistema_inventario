<?php

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

