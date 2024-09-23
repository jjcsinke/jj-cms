<?php

namespace JJCS\CMS\Providers;

use Illuminate\Support\ServiceProvider;
use JJCS\CMS\Services\CMSService;

class CmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/cms.php' => config_path('cms.php'),
            ], 'cms-config');

            $this->publishesMigrations([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

    }

    public function register()
    {
        $this->registerConfig();

        $this->app->bind('cms', function ($app) {
            return new CMSService();
        });
    }

    protected function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/cms.php' => config_path('cms.php'),
        ], 'cms-config');

    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cms.php', 'cms');

    }

}
