<?php
namespace App\View;

use App\Modules\Hobby\HobbyService;

class HobbieView
{
    public static function getView(HobbyService $service, int $id): array
    {
        $hobby = $service->getHobbyById($id);
        if ($hobby !== null)
        {
            return [
                'template' => 'hobbie.html.twig',
                'options' => [
                    'caption' => $hobby->getTitle(),
                    'photos' => $hobby->getImages(),
                    'text' => $hobby->getText(),
                ]
            ];
        }
        else
        {
            return [
                'template' => '404.html.twig',
                'options' => [],
            ];
        }
    }
}
