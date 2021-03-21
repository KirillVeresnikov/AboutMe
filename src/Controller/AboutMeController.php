<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Module\VKDataProvider;
use App\Module\Settings;
use App\Module\Notes;

class AboutMeController extends AbstractController
{
    public function index()
    {
        $settings = new Settings();
        $vk = new VKDataProvider($settings -> getValue('vkKey'));
        $user = $vk -> getUser($settings -> getValue('vkId'));
        $notes = new Notes();

        return $this->render('index.html.twig', array(
            'first_name' => $user -> getFirstName(),
            'last_name' => $user -> getLastName(),
            'bdate' => $user -> getBDate(),
            'photo' => $user -> getPhoto(),
            'status' => $user -> getStatus(),
            'notes' => $notes -> readNotes()
        ));
    }
}