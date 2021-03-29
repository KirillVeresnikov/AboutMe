<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Module\VKDataProviderInterface;
use App\Module\NotesInterface;
use App\Module\Settings;

class AboutMeController extends AbstractController
{
    public function index(VKDataProviderInterface $vk, NotesInterface $notes)
    {
        $user = $vk->getUser(Settings::getValue('vkId'));

        return $this->render('index.html.twig', [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'bdate' => $user->getBirthDate(),
            'photo' => $user->getPhoto(),
            'status' => $user->getStatus(),
            'notes' => $notes->getNotes()
        ]);
    }
}