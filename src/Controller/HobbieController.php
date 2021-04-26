<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Module\Hobbies;
use App\Module\Hobbie;
use App\Module\HobbiesFactory;

class HobbieController extends AbstractController
{
    public function index($id)
    {
        $hobbies = HobbiesFactory::hobbiesCreate();    
        $hobbie = $hobbies->getHobbieById($id);
        
        return $this->render('hobbie.html.twig', [
            'caption' => $hobbie->getCaption(),
            'photos' => $hobbie->getPhotos(),
            'text' => $hobbie->getText()
        ]);
    }
}