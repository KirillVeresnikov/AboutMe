<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\AboutMeView;
use App\Modules\AboutMe\App\AboutMeService;

class AboutMeController extends AbstractController
{
    public function index(AboutMeService $service): Response
    {
        $view = AboutMeView::getView($service->getUser($_ENV['vkId']), $service->getNotes());
         
        return $this->render($view['template'], $view['options']);
    }
}