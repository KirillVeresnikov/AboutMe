<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbieView;
use App\Modules\Hobby\HobbyService;

class HobbieController extends AbstractController
{
    public function index($id): Response
    {
        $service = new HobbyService();
        $view = HobbieView::getView($service, $id);

        return $this->render($view['template'], $view['options']);
    }
}