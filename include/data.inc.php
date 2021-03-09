<?php
    function getData()
    {
        $Path = '../data/settings.json';
        $result = file_get_contents($Path);
        return json_decode($result, true);
    }

    function getValue(array $data, string $key):?string
    {
        return isset($data[$key]) ? $data[$key] : null;
    }