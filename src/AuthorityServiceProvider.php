<?php


namespace Lipeng93\Authority;

use Illuminate\Support\ServiceProvider;

class AuthorityServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot() {

        $this->publishes([
            __DIR__.'/../config/authority.php' => config_path('authority.php'),
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'lipeng-authority');
    }

    public function register() {

        $this->app->singleton('authority', function($app) {
            $config = $app->make('config');

            $authority_config = $config->get('authority');

            return new Authority($authority_config);
        });
    }

    public function provides() {
        return ['authority'];
    }
}