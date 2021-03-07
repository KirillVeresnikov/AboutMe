<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutMe extends AbstractController
{
    public function index()
    {
        $url = 'https://sun9-70.userapi.com/impf/hKfoADAManyhLr99gTJIWZF0qeFZyK_vaD2HmA/IpaJKeoKOds.jpg?size=810x1080&quality=96&sign=1ad617140435042a24c3f74dc6fa6ef1&type=album';
        $caption = 'Hello World! YaY';
        return $this->render('index/index.html.twig', array(
            'caption' => $caption,
            'url' => $url,
        ));
    }
}