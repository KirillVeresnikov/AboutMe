<?php

namespace App\Modules\Hobby\App;

use App\Modules\Hobby\App\HobbyConfigurationInterface;
use App\Modules\Hobby\App\ImageProviderInterface;
use App\Modules\Hobby\Model\Hobby;

class HobbyService
{
    const QUANTITY_IMAGES = 5;
    private array $hobbies = [];
    private ImageProviderInterface $imageProvider;

    public function __construct(HobbyConfigurationInterface $configuration, ImageProviderInterface $imageProvider)
    {
        $this->imageProvider = $imageProvider;
        $index = 1;
        foreach ($configuration->getHobbyMap() as $key => $value)
        {
            $images = $this->imageProvider::getImages(self::QUANTITY_IMAGES, $key);
            if ($images !== null)
            {
                $this->addHobby($index++, $key, $value);
            }
        }
    }

    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    public function getHobbyById(int $id): ?Hobby
    {
        foreach ($this->hobbies as $hobby)
        {
            if ($hobby->getArray()['id'] === $id)
            {
                return $hobby;
            }
        }
        return null;
    }

    public function addHobby(int $id, string $title, string $text): void
    {
        $this->hobbies[] = new Hobby($id ,$title, $text, $this->imageProvider::getImages(self::QUANTITY_IMAGES, $title));
    }
}
