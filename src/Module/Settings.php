<?php
namespace App\Module;

class Settings implements AppSettings
{
    private static string $Path = '../data/settings.json';
    private array $data;

    public function __construct()
    {
        $this -> getData();
    }

    private function getData()
    {
        $result = file_get_contents($this -> Path);
        $this -> data = json_decode($result, true);
    }

    public function getValue(string $key):?string
    {
        return isset($this -> data['vk'][$key]) ? $this -> data['vk'][$key] : null;
    }
}