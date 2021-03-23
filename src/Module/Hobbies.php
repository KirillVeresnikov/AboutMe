<?php
namespace App\Module;

use IvanUskov\ImageSpider\ImageSpider;

class Hobbies
{
    private array $list;

    public function addHobbie(string $caption, string $text)
    {
        $this -> list[] = new Hobbie($caption, $text);
    }

    public function getHobbies(): array
    {
        $result;
        foreach ($this -> list as $value) {
            $result[] = $value -> getArray();
        }
        unset($value);
        return $result;
    }
}

class Hobbie
{
    private string $caption;
    private string $text;

    public function __construct(string $caption, string $text)
    {
        $this -> caption = $caption;
        $this -> text = $text;
    }

    public function getCaption()
    {
        return $this -> caption;
    }

    public function getText()
    {
        return $this -> text;
    }

    public function getPhoto()
    {
        $images = ImageSpider::find($this -> caption);
        return $images[rand(0, count($images) - 1)];
    }

    public function getArray()
    {
        $result = [
            'data' => [
                'caption' => $this -> getCaption(),
                'text' => $this -> getText(),
                'photo' => $this -> getPhoto()
            ]
        ];
        return $result;
    }
}