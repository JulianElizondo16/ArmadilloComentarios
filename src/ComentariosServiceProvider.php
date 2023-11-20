<?php

namespace julianelizondo16\armadillocomentarios;

use Illuminate\Support\ServiceProvider;

class ComentariosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        /*  Base de datos */
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        /*  Llamada de vistas */
        $this->publishes([
            __DIR__ . '/views/vistasPrincipales' => resource_path('views/vistasPrincipales'),
        ], 'VistasComentarios');
        $this->publishes([
            __DIR__ . '/resources/views/livewire' => resource_path('views/livewire'),
        ], 'navigation');
        /* Ingresar las imagenes del paquete */
        $this->publishes([
            __DIR__ . '/public/img' => public_path('img'),
        ], 'ImagenesCyber');
        /* Llamada de controladores */
        $this->publishes([
            __DIR__ . '/Controllers' => app_path('/Http/Controllers'),
        ], 'ComentariosController');
        /* Llamada de los Modelos */
        $this->publishes([
            __DIR__ . '/Models' => app_path('Models'),
        ], 'Comentario');
    }
}