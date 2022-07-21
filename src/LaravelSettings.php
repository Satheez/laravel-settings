<?php

namespace Satheez\LaravelSettings;

use Satheez\LaravelSettings\Helpers\Crypt;
use Satheez\LaravelSettings\Helpers\Transform;

class LaravelSettings
{
    public function __construct()
    {
        $this->db = \Illuminate\Support\Facades\DB::table('settings');
    }

    /**
     * @param  string  $key
     * @param $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        if ($this->isCachable() && $value = cache()->get($this->cacheKey($key))) {
            return $value;
        }

        $value = optional($this->db->where('key', $key)->first())->value;
        if (empty($value)) {
            return $default;
        }

        $value = Transform::unserialize($value);
        $originalValue = $this->isCryptable() ? Crypt::decrypt($value) : $value;
        if ($this->isCachable()) {
            cache()->set($this->cacheKey($key), $originalValue, config('cache.ttl'));
        }

        return $originalValue;
    }

    /**
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function set(string $key, mixed $value)
    {
        if ($this->isCachable()) {
            cache()->set($this->cacheKey($key), $value, config('cache.ttl'));
        }

        $this->db->updateOrInsert(['key' => $key],
            ['value' => Transform::serialize($this->isCryptable() ? Crypt::encrypt($value) : $value)]
        );
    }

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
    private function settings(string|array $parameter): mixed
    {
        if (is_string($parameter)) {
            return $this->get($parameter);
        }

        foreach ($parameter as $key => $value) {
            $this->set($key, $value);
        }

        return true;
    }

    /**
     * @param  string  $key
     * @return string
     */
    private function cacheKey(string $key): string
    {
        return "settings|table|{$key}";
    }

    /**
     * @return bool
     */
    private function isCryptable(): bool
    {
        return config('settings.cache.enabled');
    }

    /**
     * Is cachable data
     *
     * @return bool
     */
    private function isCachable(): bool
    {
        return config('settings.cache.enabled');
    }
}
