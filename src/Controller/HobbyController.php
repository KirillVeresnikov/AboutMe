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
        $view = HobbyView::getView($service, $id);

        return $this->render($view['template'], $view['options']);
    }

    public function update(Request $request, HobbyService $service): Response
    {
        $id = (int) $request->request->getDigits('id');
        $hobby = $service->getHobbyById($id);
        if ($hobby === null) {
            return new Response(500);
        }
        
        $service->updateImage($hobby['hobby']->getTitle());

        return new Response('OK');
    }
}