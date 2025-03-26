<?php

namespace App\Providers;

use App\Interfaces\ArticuloRepositoryInterface;
use App\Interfaces\CategoriaRepositoryInterface;
use App\Interfaces\GrupoRepositoryInterface;
use App\Repositories\ArticuloRepository;
use App\Repositories\CategoriaRepository;
use App\Repositories\GrupoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ArticuloRepositoryInterface::class,ArticuloRepository::class);
        $this->app->bind(CategoriaRepositoryInterface::class,CategoriaRepository::class);
        $this->app->bind(GrupoRepositoryInterface::class,GrupoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
