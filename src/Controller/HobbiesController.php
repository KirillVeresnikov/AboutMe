<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Module\Hobbies;
use App\Module\Hobbie;
use App\Module\HobbiesFactory;

class HobbiesController extends AbstractController
{
    public function index()
    {   
        $hobbies = HobbiesFactory::hobbiesCreate();     
        return $this->render('hobbies.html.twig', [
            'notes' => $hobbies->getHobbies()
        ]);
    }
}