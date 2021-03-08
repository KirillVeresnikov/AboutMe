<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

require_once('../include/common.inc.php');

class AboutMe extends AbstractController
{
    public function index()
    {
        $settings = getData();
        $user = getUser($settings['vk']['vkKey'], $settings['vk']['vkId']);

        $notesName = getNotesName();
        $notes = readNotes($notesName);

        return $this->render('index.html.twig', array(
            'first_name' => $user[0]['first_name'],
            'last_name' => $user[0]['last_name'],
            'bdate' => $user[0]['bdate'],
            'photo' => $user[0]['photo_max'],
            'status' => $user[0]['status'],
            'notes' =>$notes
        ));
    }


}