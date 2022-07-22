<?php

namespace Satheez\LaravelSettings\Helpers\Contract;

interface Cryptable
{
    /**
     * @param  string  $value
     * @return string
     */
    public static function encrypt(string $value): string;

    /**
     * Decrypt given data
     *
     * @param string $encryptedValue
     * @return string
     */
    public static function decrypt(string $encryptedValue): string;
}
