<?php
namespace App\View;

use App\Modules\AboutMe\AboutMeService;

class AboutMeView
{
    public static function getView(AboutMeService $service): array
    {
        $user = $service->getUser($_ENV['vkId']);
        if($user === null)
        {
            return [
                'template' => '404.html.twig',
                'options' => [
                    'pageTitle' => 'Пользователь не найден.',
                    'problems' => 'Пользователь с таким ID не найден, проверьте .env'
                ],
            ];
        }

        return [
            'template' => 'index.html.twig',
            'options' => [
                'pageTitle' => $user->getFirstName().' '.$user->getLastName(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'bdate' => $user->getBirthDate(),
                'photo' => $user->getPhoto(),
                'status' => $user->getStatus(),
                'notes' => $service->getNotes(),
            ]
        ];
    }
}
