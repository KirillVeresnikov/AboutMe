<?php

namespace App\Modules\Hobby\App;

use App\Modules\Hobby\App\HobbyRepositoryInterface;
use App\Modules\Hobby\App\ImageRepositoryInterface;
use App\Modules\Hobby\App\ImageProviderInterface;
use App\Modules\Hobby\Model\DetailedHobby;
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
    }

    public function getHobbies(): ?array
    {
        $hobbies = $this->hobbyRepository->getHobbies();
        if ($hobbies === null)
        {
            return null;
        }

        $result = [];

        foreach ($hobbies as $hobby)
        {
            $images = [];
            foreach ($this->imageRepository->getImagesByTitle($hobby->getTitle()) as $value)
            {
               $images[] = $value;
            }

            $result[] = new DetailedHobby($hobby, $images);
        }

        return $result;
    }

    public function getHobbyById(int $id): ?DetailedHobby
    {
        $hobby = $this->hobbyRepository->getHobbyById($id);
        if ($hobby === null)
        {
            return null;
        }

        $images = [];
        foreach ($this->imageRepository->getImagesByTitle($hobby->getTitle()) as $value)
        {
            $images[] = $value;
        }

        return new DetailedHobby($hobby, $images);
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

        return null;
    }
    
    private function addHobby(string $title, string $text): void
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
}
