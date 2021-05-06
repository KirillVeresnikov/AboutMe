<?php
namespace App\View;

use App\Modules\AboutMe\AboutMeService;

class AboutMeView
{
    public static function getView(AboutMeService $service)
    {
        $user = $service->getUser($_ENV['vkId']);
        if($user === null)
        {
            return [
                'template' => '404.html.twig',
                'options' => [],
            ];
        }
        
        return [
            'template' => 'index.html.twig',
            'options' => [
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
