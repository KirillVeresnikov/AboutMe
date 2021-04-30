<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbiesView;

class HobbiesController extends AbstractController
{
    public function index()
    {   
        $view = HobbiesView::getView();

        return $this->render($view['template'], $view['options']);
    }
}