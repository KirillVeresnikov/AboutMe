<?php
namespace App\Module;

class Settings
{
    public static function getValue(string $key):?string
    {
        return isset($_ENV[$key]) ? $_ENV[$key] : null;
    }
}