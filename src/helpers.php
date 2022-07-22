<?php

if (! function_exists('settings')) {

    /**
     * Get/set settings data
     * Assumed, if the parameter value is string, then it is a get method,
     * Otherwise it is a set method
     * Ex. Get -> settings('service.refresh_token')
     *    Post -> settings(['service.refresh_token' => 'xxxyyyzzz'])
     *
     * @param  string|array  $parameter
     * @return mixed
     */
    function settings(string|array $parameter): mixed
    {
        try {
            return app()->get('settings')->settings($parameter);
        } catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
            return null;
        }
    }
}

if (! function_exists('settings_get')) {
    /**
<<<<<<< Updated upstream
     * @param  string  $key
     * @param $default
=======
     * @param string $key
     * @param null $default
>>>>>>> Stashed changes
     * @return mixed
     */
    function settings_get(string $key, $default = null): mixed
    {
        try {
            return app()->get('settings')->get($key, $default);
        } catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
            return $default;
        }
    }
}

if (! function_exists('settings_set')) {
    /**
     * @param  string  $key
     * @param $value
     * @return void
     */
    function settings_set(string $key, $value): void
    {
        try {
            app()->get('settings')->set($key, $value);
        } catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
        }
    }
}
