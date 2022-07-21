<?php

namespace Satheez\LaravelSettings\Helpers;

use Illuminate\Support\Facades\Crypt as LaravelCrypt;
use Satheez\LaravelSettings\Helpers\Contract\Cryptable;

class Crypt implements Cryptable
{
    /**
     * @param  mixed  $value
     * @return string
     */
    public static function encrypt(string $value): string
    {
        return LaravelCrypt::encryptString($value);
    }

    /**
     * Decrypt given data
     *
     * @return string
     */
    public static function decrypt(string $encrptedValue): string
    {
        return LaravelCrypt::decryptString($encrptedValue);
    }
}
