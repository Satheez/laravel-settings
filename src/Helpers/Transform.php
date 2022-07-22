<?php

namespace Satheez\LaravelSettings\Helpers;

use Satheez\LaravelSettings\Helpers\Contract\Serializable;

class Transform implements Serializable
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
     * @param  string  $serializedValue
     * @return string
     */
    public static function unserialize(string $serializedValue): string
    {
        return unserialize($serializedValue, ['allowed_classes' => false]);
    }
}
