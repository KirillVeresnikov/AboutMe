<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\AboutMeView;
use App\Module\VKDataProviderInterface;
use App\Module\NotesRepositoryInterface;

class AboutMeController extends AbstractController
{
    public function index(VKDataProviderInterface $vk, NotesRepositoryInterface $notes)
    {
        $view = AboutMeView::getView($vk, $notes);
         
        return $this->render($view['template'], $view['options']);
    }
}