<?php
namespace App\Module;

class Settings
{
    private const PATH = '../data/settings.json';

    private static function getData()
    {
        $result = file_get_contents(Settings::PATH);
        return json_decode($result, true);
    }

    public static function getValue(string $part, string $key):?string
    {
        $data = Settings::getData();
        return isset($data[$part][$key]) ? $data[$part][$key] : null;
    }
}