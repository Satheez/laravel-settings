<?php

namespace Satheez\LaravelSettings\Helpers;

use Illuminate\Encryption\Encrypter;
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
        return LaravelCrypt::encrypt($value);
    }

    /**
     * Decrypt given data
     *
     * @param string $encryptedValue
     * @return string
     */
    public static function decrypt(string $encryptedValue): string
    {
        return LaravelCrypt::decryptString($encryptedValue);
    }
}
