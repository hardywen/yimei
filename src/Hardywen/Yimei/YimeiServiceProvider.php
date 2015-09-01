<?php namespace Hardywen\Yimei;

use Illuminate\Support\ServiceProvider;

require_once(__DIR__ . '/Client.php');

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
        $source = realpath(__DIR__ . '/../../config/yimei.php');
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

            $config = $app['config']['yimei'];

            $url = $config ['url'];
            $serialNumber = $config ['serialNumber'];
            $password = $config ['password'];
            $sessionKey = $config ['sessionKey'];
            $contentTpl = $config ['contentTpl'];
            $proxyhost = false;
            $proxyport = false;
            $proxyusername = false;
            $proxypassword = false;
            $timeout = 2;
            $response_timeout = 10;

            return new \Client($url, $serialNumber, $password, $sessionKey, $proxyhost, $proxyport,
                $proxyusername, $proxypassword, $timeout, $response_timeout, $contentTpl);

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
