<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Grupo;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('login');

// Route::get('/registrate', function(){
//     return view('registrate');
// })->middleware('guest')->name('registrate');

//incorrecto debo hacer la vista con un controlador porque debe ejecutar instantaneamente el metodo index para ver productos

Route::middleware(['auth'])->group(function(){
    Route::get('logout',[LoginController::class, 'logout'])->name('logout');
    Route::view('inventario','inventario.dashboard')->middleware('rol:admin')->name('inventario.dashboard');
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
    Route::middleware('rol:admin')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('inventario/usuario','index')->name('usuario.index');
            Route::get('inventario/usuario/create', 'create')->name('usuario.create');
            Route::post('inventario/usuario','store')->name('usuario.store');
            Route::get('inventario/usuario/{user}/edit', 'edit')->name('usuario.edit');
            Route::patch('inventario/usuario/{user}','update')->name('usuario.update');
            Route::patch('inventario/usuario/{user}/estado','updateEstado')->name('usuario.updateEstado');
        });
    });
    
});

Route::middleware('guest')->group(function(){
    Route::controller(LoginController::class)->group(function(){
        // Route::post('registrate', 'register')->name('registrate.register');
        Route::post('login', 'login')->name('login.login');
        
    });
});
