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
        $db = \Illuminate\Support\Facades\DB::table('settings');
        if (is_string($parameter)) {
            $key = $parameter;

            return cache()
                ->remember(
                    "settings|table|{$key}",
                    60 * 60,
                    function () use ($key, $db) {
                        return optional($db->where('key', $key)->first())->value;
                    }
                );
        }

        foreach ($parameter as $key => $value) {
            $db->updateOrInsert(
                ['key' => $key],
                ['value' => $value]
            );

            /**
             * Update the value to cache (so no DB call to be made next time)
             * Also if the value is already exists, then existing data will be updated
             */
            try {
                cache()->set("settings|table|{$key}", $value);
            } catch (\Psr\SimpleCache\InvalidArgumentException $e) {
                report($e);
            }
        }

        return true;
    }
}

if (! function_exists('settings_get')) {
    /**
     * @param  string  $key
     * @param $default
     * @return mixed
     */
    function settings_get(string $key, $default = null)
    {
        return settings($key) ?? $default;
    }
}

if (! function_exists('settings_set')) {
    /**
     * @param  string  $key
     * @param $value
     * @return void
     */
    function settings_set(string $key, $value)
    {
        settings([$key => $value]);
    }
}
