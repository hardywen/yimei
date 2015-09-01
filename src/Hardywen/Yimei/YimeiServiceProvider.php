<?php namespace Hardywen\Yimei;

use Illuminate\Support\ServiceProvider;

class YimeiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../../config/config.php');
        $this->publishes([$source => config_path('yimei.php')]);
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app['yimei'] = $app->share(function ($app) {
            return Yimei::instance($app['config']['yimei']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('yimei');
    }

}
