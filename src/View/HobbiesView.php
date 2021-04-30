<?php
namespace App\View;

use App\Module\Hobbies;
use App\Module\Hobbie;
use App\Module\HobbiesFactory;

class HobbiesView
{
    public static function getView()
    {
        $hobbies = HobbiesFactory::hobbiesCreate();

        return [
            'template' => 'hobbies.html.twig',
            'options' => [
                'notes' => $hobbies->getHobbies()
            ]
        ];
    }
}