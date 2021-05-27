<?php

namespace App\View;

use App\Modules\Hobby\Model\DetailedHobby;

class HobbiesView
{
    public static function getView(array $hobbies): array
    {
        $result = [];
        foreach ($hobbies as $hobby) 
        {
            $result[] = [
                'array' => [
                    'data' => [
                        'caption' => $hobby->getTitle(),
                        'text' => $hobby->getText(),
                        'image' => $hobby->getImage()->getUrl(),
                    ],
                ],
                'url' => '/hobby/'.$hobby->getId(),
            ];
        }
        
        return [
            'template' => 'hobbies.html.twig',
            'options' => [
                'pageTitle' => 'Мои увлечения',
                'notes' => $result,
            ]
        ];
    }
}