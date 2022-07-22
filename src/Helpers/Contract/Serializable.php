<?php

namespace Satheez\LaravelSettings\Helpers\Contract;

interface Serializable
{
    /**
     * @param  mixed  $value
     * @return string
     */
    public static function serialize(mixed $value): string;

    /**
     * @param string $serializedValue
     * @return string
     */
    public static function unserialize(string $serializedValue): string;
}
