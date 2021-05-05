<?php
namespace App\View;

use App\Modules\Hobby\HobbyService;

class HobbiesView
{
    public static function getView(HobbyService $service): array
    {
        $result = [];
        foreach ($service->getHobbies() as $hobby) 
        {
            $result[] = [
                'array' => $hobby->getArray(),
                'url' => '/hobbie/'.$hobby->getArray()['id'],
            ];
        }
        
        return [
            'template' => 'hobbies.html.twig',
            'options' => [
                'notes' => $result,
            ]
        ];
    }
}