<?php
namespace App\View;

use App\Module\Hobbies;
use App\Module\Hobbie;
use App\Module\HobbiesFactory;

class HobbieView
{
    public static function getView(int $id)
    {
        $hobbies = HobbiesFactory::hobbiesCreate();    
        $hobbie = $hobbies->getHobbieById($id);

        return [
            'template' => 'hobbie.html.twig',
            'options' => [
                'caption' => $hobbie->getCaption(),
                'photos' => $hobbie->getPhotos(),
                'text' => $hobbie->getText()
            ]
        ];
    }
}