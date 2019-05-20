<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //Morphmap para os relacionamentos com polimorfismo
        Relation::morphMap([
            'pacote' => 'App\PedidoPacote',
            'passagem' => 'App\PedidoPassagem',
           
        ]);
    }

     // 'passageiropacote' => 'App\PedidoPacote',
            // 'passageiropassagem' => 'App\PedidoPassagem',
            // 'notificacaopacote' => 'App\PedidoPacote',
            // 'notificacaopassagem' => 'App\PedidoPassagem',
            // 'comentariopacote' => 'App\PedidoPacote',
            // 'comentariopassagem' => 'App\PedidoPassagem',
            // 'contactopacote' => 'App\PedidoPacote',
            // 'contactopassagem' => 'App\PedidoPassagem',
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
