<?php namespace Transloadit\Laravel;

use transloadit\Transloadit;
use Illuminate\Support\ServiceProvider;

class TransloaditServiceProvider extends ServiceProvider {

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('edgji/transloadit-php-sdk-laravel', 'transloadit');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['transloadit'] = $this->app->share(function ($app) {
            // Retrieve the config
            $config = $app['config']['transloadit'] ?: $app['config']['transloadit::config'];

            $transloadit = new Transloadit($config);

            return $transloadit;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('transloadit');
	}

}