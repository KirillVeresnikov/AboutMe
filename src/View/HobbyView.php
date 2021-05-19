<?php
namespace App\View;

use App\Modules\Hobby\App\HobbyService;

class HobbyView
{
    public static function getView(HobbyService $service, int $id): array
    {
        $hobby = $service->getHobbyById($id);
        if ($hobby !== null)
        {
            return [
                'template' => 'hobby.html.twig',
                'options' => [
                    'pageTitle' => $hobby->getTitle(),
                    'photos' => $hobby->getImages(),
                    'text' => $hobby->getText(),
                ]
            ];
        }
        else
        {
            return [
                'template' => '404.html.twig',
                'options' => [
                    'pageTitle' => 'Страница не найдена!',
                    'problems' => 'Мы уже ищем причину почему вы тут оказались :)',
                ],
            ];
        }
    }
}
