<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\View\HobbyView;
use App\Modules\Hobby\App\HobbyService;
use Symfony\Component\HttpFoundation\Request;

class HobbyController extends AbstractController
{
    public function index(int $id, HobbyService $service): Response
    {
        $view = HobbyView::getView($service->getHobbyById($id));

        return $this->render($view['template'], $view['options']);
    }

    public function update(Request $request, HobbyService $service): Response
    {
        $id = (int) $request->request->getDigits('id');
        $hobby = $service->getHobbyById($id);

        if ($hobby === null)
        {
            return new Response(404);
        }
        
        if ($service->updateImage($hobby->getTitle() === null))
        {
            return new Response(400);
        }

        return new Response('OK');
    }
}