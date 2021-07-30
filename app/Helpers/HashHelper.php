<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Hash;

class HashHelper
{
    public static function encryptValue(string $value): string
    {
        return Hash::make($value, ['rounds' => '12']);
    }
}
