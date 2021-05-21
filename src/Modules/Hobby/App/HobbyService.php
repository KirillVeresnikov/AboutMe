<?php

namespace App\Modules\Hobby\App;

use App\Modules\Hobby\App\HobbyRepositoryInterface;
use App\Modules\Hobby\App\ImageRepositoryInterface;
use App\Modules\Hobby\App\ImageProviderInterface;
use App\Modules\Hobby\Model\Hobby;
use App\Modules\Hobby\Model\Image;

class HobbyService
{
    const QUANTITY_IMAGES = 5;

    private HobbyRepositoryInterface $hobbyRepository;
    private ImageRepositoryInterface $imageRepository;

    private ImageProviderInterface $imageProvider;

    public function __construct(HobbyRepositoryInterface $hobbyRepository, ImageRepositoryInterface $imageRepository, ImageProviderInterface $imageProvider)
    {
        $this->hobbyRepository = $hobbyRepository;
        $this->imageRepository = $imageRepository;
        $this->imageProvider = $imageProvider;

        //$this->initRepo(); //если БД пустая, раскоментировать
    }

    private function initRepo(): void
    {
        $title = 'Дрифт';
        $text = 'Дрифт — техника прохождения поворотов и вид автоспорта, характеризующийся использованием управляемого заноса на максимально возможных для удержания на трассе скорости и угла к траектории.';
        $this->addHobby($title, $text);

        $title = 'Yo-Yo';
        $text = 'Йо-йо — игрушка, состоящая из двух одинаковых по размеру и весу дисков, скреплённых между собой осью, на которую петелькой надета верёвка. Работает по принципу маятника Максвелла и гироскопа.';
        $this->addHobby($title, $text);

        $title = 'Велопутешествие';
        $text = 'Велосипедный туризм — один из видов туризма, в котором велосипед служит главным или единственным средством передвижения.';
        $this->addHobby($title, $text);

        $title = 'Музыка';
        $text = 'Информация про музыку...Му́зыка (греч. μουσική, субстантивированное прилагательное от греч. μούσα — муза) — вид искусства.';
        $this->addHobby($title, $text);

        $title = 'Фингерборд';
        $text = 'Фингерборд — уменьшенная копия (в масштабе примерно 1 к 8) скейтборда, предназначенная для катания на пальцах и выполнения трюков, идентичных скейтборду, дома.';
        $this->addHobby($title, $text);
    }

    public function getHobbies(): ?array
    {
        $hobbies = $this->hobbyRepository->getHobbies();
        if ($hobbies === null)
        {
            return null;
        }

        $result = [
            'hobbies' => [],
        ];

        foreach ($hobbies as $hobby)
        {
            $images = [];
            foreach ($this->imageRepository->getImagesByTitle($hobby->getTitle()) as $value)
            {
               $images[] = $value->getUrl();
            }

            $result['hobbies'][] = [
                'hobby' => $hobby,
                'images' => $images,
            ];
        }

        return $result;
    }

    public function getHobbyById(int $id): ?array
    {
        $hobby = $this->hobbyRepository->getHobbyById($id);
        if ($hobby === null)
        {
            return null;
        }

        $images = [];
        foreach ($this->imageRepository->getImagesByTitle($hobby->getTitle()) as $value)
        {
            $images[] = $value->getUrl();
        }

        return [
            'hobby' => $hobby,
            'images' => $images,
        ];
    }

    public function addHobby(string $title, string $text): void
    {
        $hobby = new Hobby($title, $text);
        if ($this->hobbyRepository->getHobbyByTitle($title) === null)
        {
            $this->hobbyRepository->addHobby($hobby);
        }
        
        $images = $this->imageProvider->getImages(self::QUANTITY_IMAGES, $title);
        if ($images !== null) {
            foreach ($images as $url)
            {
                $this->imageRepository->addImage(new Image($title, $url));
            }
        }
    }

    public function updateImage(string $title): ?bool
    {
        $images = [];
        $urls = $this->imageProvider->getImages(self::QUANTITY_IMAGES, $title);
        if ($urls !== null)
        {
            foreach ($urls as $value)
            {
                $images[] = new Image($title, $value);
            }
            $this->imageRepository->updateImageByTitle($title, $images);

            return true;
       } 
       else
       {
           return null;
       }
    }
}
