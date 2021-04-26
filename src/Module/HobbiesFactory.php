<?php
namespace App\Module;

use App\Module\Hobbies;
use App\Module\Hobbie;

class HobbiesFactory
{
    public static function hobbiesCreate(): Hobbies
    {
        $hobbies = new Hobbies();

        $caption = "Дрифт";
        $text = "Test text.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Yo-yo";
        $text = "Test text.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Фингерборд";
        $text = "Test text.";
        $hobbies->addHobbie($caption, $text);

        $caption = "Велосипед";
        $text = "Test text.";
        $hobbies->addHobbie($caption, $text);

        return $hobbies;
    }
}