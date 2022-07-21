<?php

namespace Satheez\LaravelSettings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Satheez\LaravelSettings\LaravelSettings
 */
class LaravelSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'settings';
    }
}
