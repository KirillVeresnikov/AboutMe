<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use IvanUskov\ImageSpider\ImageSpider;
use App\Module\Hobbies;

class HobbiesController extends AbstractController
{
    public function index()
    {
        $hobbies = new Hobbies();
        $caption = 'Дрифт';
        $text = 'Облака делают дрифтеры...';
        $hobbies -> addHobbie($caption, $text);

        $caption = 'Йо-Йо';
        $text = 'Играл в Йо-Йо в расцвет ее популярности.';
        $hobbies -> addHobbie($caption, $text);

        $caption = 'Велосипед';
        $text = 'Люблю ездить на велосипеде.';
        $hobbies -> addHobbie($caption, $text);

        $caption = 'Фингерборд';
        $text = 'Случайно как-то получилось.';
        $hobbies -> addHobbie($caption, $text);
        unset($caption, $text);

        return $this -> render('hobbies.html.twig', array(
            'notes' => $hobbies -> getHobbies()
        ));
    }
}