<?php
namespace App\View;

use App\Module\VKDataProvider;
use App\Module\Notes;
use App\Module\Settings;

class AboutMeView
{
    public static function getView(VKDataProvider $vk, Notes $notes)
    {
        $user = $vk->getUser(Settings::getValue('vkId'));

        return [
            'template' => 'index.html.twig',
            'options' => [
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'bdate' => $user->getBirthDate(),
                'photo' => $user->getPhoto(),
                'status' => $user->getStatus(),
                'notes' => $notes->getNotes()
            ]
        ];
    }
}