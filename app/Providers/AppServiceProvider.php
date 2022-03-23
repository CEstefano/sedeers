<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //   Nombres traducidos de las rutas Resorce Api
        // El \ o el use 'ruta\Route'  me sirve para poder usar Route
        //   \Route::resource o *** ir a inicio de clase
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar'
        ]);


        //Establecer que toda cadena caracter en migraciones tendran un tamaño de 191 y no de 255
        Schema::defaultStringLength(191);
    }
}
