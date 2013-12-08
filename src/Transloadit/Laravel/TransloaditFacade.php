<?php namespace Transloadit\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the Transloadit
 */
class TransloaditFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'transloadit';
    }
}
