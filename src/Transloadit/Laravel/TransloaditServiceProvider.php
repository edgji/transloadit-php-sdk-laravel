<?php namespace Transloadit\Laravel;

use transloadit\Transloadit;
use Illuminate\Support\ServiceProvider;

class TransloaditServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

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
            if (isset($config['config_file'])) {
                $config = $config['config_file'];
            }

            $transloadit = new Transloadit($config);

            return $transloadit;
        });
	}

	/**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('transloadit/php-sdk', 'transloadit');
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