<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbyView;
use App\Modules\Hobby\App\HobbyService;

class HobbieController extends AbstractController
{
    public function index(int $id, HobbyService $service): Response
    {
        $view = HobbyView::getView($service, $id);

        return $this->render($view['template'], $view['options']);
    }
}