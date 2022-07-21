<?php

namespace Satheez\LaravelSettings\Helpers;

use Satheez\LaravelSettings\Helpers\Contract\Serializable;

class Tansform implements Serializable
{
    /**
     * @param  mixed  $value
     * @return string
     */
    public static function serialize(mixed $value): string
    {
        return serialize($value);
    }

    /**
     * @return mixed
     */
    public static function unserialize(string $serializedValue): mixed
    {
        return unserialize($serializedValue);
    }
}
