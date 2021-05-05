<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\AboutMeView;
use App\Modules\AboutMe\AboutMeService;

class AboutMeController extends AbstractController
{
    public function index(): Response
    {
        $service = new AboutMeService();
        $view = AboutMeView::getView($service);
         
        return $this->render($view['template'], $view['options']);
    }
}