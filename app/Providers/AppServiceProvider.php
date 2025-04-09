<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Interfaces\ArticuloRepositoryInterface;
use App\Interfaces\CategoriaRepositoryInterface;
use App\Interfaces\GrupoRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Policies\UserPolicy;
use App\Repositories\ArticuloRepository;
use App\Repositories\CategoriaRepository;
use App\Repositories\GrupoRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Gate::policy(User::class,UserPolicy::class);

        Gate::define('view-admin',function(User $user){
            return $user->role->name === 'admin';
        });
    }
}
