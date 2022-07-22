<?php

if (!function_exists('settings')) {

    /**
     * Get/set settings data
     * Assumed, if the parameter value is string, then it is a get method,
     * Otherwise it is a set method
     * Ex. Get -> settings('service.refresh_token')
     *    Post -> settings(['service.refresh_token' => 'xxxyyyzzz'])
     *
     * @param string|array $parameter
     * @return mixed
     */
    function settings(string|array $parameter): mixed
    {
        return app()->get('settings')->settings($parameter);
    }
}

if (!function_exists('settings_get')) {
    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    function settings_get(string $key, $default = null): mixed
    {
        return app()->get('settings')->get($key, $default);
    }
}

if (!function_exists('settings_set')) {
    /**
     * @param string $key
     * @param $value
     * @return void
     */
    function settings_set(string $key, $value): void
    {
        app()->get('settings')->set($key, $value);
    }
}
