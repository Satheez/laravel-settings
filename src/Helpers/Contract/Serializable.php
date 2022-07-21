<?php

namespace Satheez\LaravelSettings\Helpers\Contract;

interface Serializable
{
    /**
     * @param mixed $value
     * @return string
     */
    public static function serialize(mixed $value): string;

    /**
     * @return mixed
     */
    public static function unserialize(string $serializedValue): mixed;
}
