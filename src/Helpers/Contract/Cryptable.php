<?php

namespace Satheez\LaravelSettings\Helpers\Contract;

interface Cryptable
{
    /**
     * @param string $value
     * @return string
     */
    public static function encrypt(string $value): string;

    /**
     * Decrypt given data
     * @return mixed
     */
    public static function decrypt(string $encrptedValue): string;
}
