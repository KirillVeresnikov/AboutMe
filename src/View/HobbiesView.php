<?php

namespace App\View;

use App\Modules\Hobby\App\HobbyService;

class HobbiesView
{
    public static function getView(HobbyService $service): array
    {
        $result = [];
        foreach ($service->getHobbies()['hobbies'] as $hobby) 
        {
            $result[] = [
                'array' => [
                    'data' => [
                        'caption' => $hobby['hobby']->getTitle(),
                        'text' => $hobby['hobby']->getText(),
                        'images' => $hobby['images'],
                    ],
                ],
                'url' => '/hobby/'.$hobby['hobby']->getId(),
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