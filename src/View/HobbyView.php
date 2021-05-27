<?php

namespace App\View;

use App\Modules\Hobby\Model\DetailedHobby;

class HobbyView
{
    public static function getView(DetailedHobby $hobby): array
    {
        if ($hobby !== null)
        {
            $images = [];
            foreach ($hobby->getImages() as $image) {
                $images[] = $image->getUrl();
            }

            return [
                'template' => 'hobby.html.twig',
                'options' => [
                    'id' => $hobby->getId(),
                    'pageTitle' => $hobby->getTitle(),
                    'photos' => $images,
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
