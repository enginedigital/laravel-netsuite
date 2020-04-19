<?php

namespace EngineDigital\NetSuite\Providers;

use Illuminate\Support\ServiceProvider;
use EngineDigital\NetSuite\Services\ConfigService;
use EngineDigital\NetSuite\Services\RestletService;

class NetSuiteApiProvider extends ServiceProvider
{

    /**
     * Register a singleton binding for 'NetSuiteApiService' in the APP container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('NetSuiteApiService', static function ($app) {
            return new RestletService((new ConfigService())->getRestletConfig());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['NetSuiteApiService'];
    }

}
