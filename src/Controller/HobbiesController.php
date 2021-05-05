<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbiesView;
use App\Modules\Hobby\HobbyService;

class HobbiesController extends AbstractController
{
    public function index(): Response
    {   
        $service = new HobbyService();
        $view = HobbiesView::getView($service);

        return $this->render($view['template'], $view['options']);
    }
}