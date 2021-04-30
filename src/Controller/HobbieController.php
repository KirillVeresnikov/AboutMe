<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbieView;

class HobbieController extends AbstractController
{
    public function index($id)
    {
        $view = HobbieView::getView($id);

        return $this->render($view['template'], $view['options']);
    }
}