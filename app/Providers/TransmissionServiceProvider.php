<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Transmission\Transmission;
use Transmission\Client;

class TransmissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Transmission::class, function ($app) {
            $config = $app['config']['transmission'];
            $transmission = new Transmission();
            $client = new Client($config['host'], $config['port'], $config['path']);
            if ($config['authenticate']) {
                $client->authenticate($config['username'], $config['password']);
            }
            $transmission->setClient($client);
            return $transmission;
        });
    }

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