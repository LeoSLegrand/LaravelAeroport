<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Définir une Gate pour l'accès d'aéroports
        Gate::define('access-airports', function ($user) {
            return $user->isAn('admin');
        });

        // // Définir une Gate pour la création d'aéroports
        // Gate::define('create-airports', function ($user) {
        //     return $user->isAn('admin');
        // });

        // // Définir une Gate pour l'édition d'aéroports
        // Gate::define('edit-airports', function ($user) {
        //     return $user->isAn('admin');
        // });

        // // Définir une Gate pour la suppression d'aéroports
        // Gate::define('delete-airports', function ($user) {
        //     return $user->isAn('admin');
        // });



        // Définir une Gate pour l'accès des compagnies
        Gate::define('access-compagnie', function ($user) {
            return $user->isAn('roleCompagnie');
        });

        // // Définir une Gate pour la création des compagnies
        // Gate::define('create-compagnie', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });

        // // Définir une Gate pour l'édition des compagnies
        // Gate::define('edit-compagnie', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });

        // // Définir une Gate pour la suppression des compagnies
        // Gate::define('delete-compagnie', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });

        
        // Définir une Gate pour l'accès des vols
        Gate::define('access-vols', function ($user) {
        return $user->isAn('roleCompagnie');
        });

        // // Définir une Gate pour la création des vols
        // Gate::define('create-vols', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });

        // // Définir une Gate pour l'édition des vols
        // Gate::define('edit-vols', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });

        // // Définir une Gate pour la suppression des vols
        // Gate::define('delete-vols', function ($user) {
        //     return $user->isAn('roleCompagnie');
        // });
    }
}
