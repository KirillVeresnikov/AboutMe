<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbiesView;
use App\Modules\Hobby\App\HobbyService;

class HobbiesController extends AbstractController
{
    public function index(HobbyService $service): Response
    {   

        $view = HobbiesView::getView($service->getHobbies());

        return $this->render($view['template'], $view['options']);
    }

    public function update(HobbyService $service): Response
    {
        foreach ($service->getHobbies() as $hobby)
        {
            if ($service->updateImage($hobby->getTitle()) === null)
            {
                return new Response(400);
            }
        }
        
        return new Response('OK');
    }
}