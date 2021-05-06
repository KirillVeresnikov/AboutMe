<?php

namespace App\Modules\Hobby;

use App\Modules\Hobby\Infrastructure\ImageProvider;
use App\Modules\Hobby\Infrastructure\HobbyRepository;
use App\Modules\Hobby\Model\Hobby;

class HobbyService
{
    const QUANTITY_IMAGES = 5;
    private array $hobbies = [];
    private int $index;

    public function __construct()
    {
        $index = 1;
        $repository = new HobbyRepository();
        foreach ($repository->getHobbyMap() as $key => $value)
        {
            $images = ImageProvider::getImages(self::QUANTITY_IMAGES, $key);
            if ($images !== null)
            {
                $this->hobbies[] = new Hobby($index++ ,$key, $value, $images);
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
        $this->hobbies[] = new Hobby($id ,$title, $text, $imageProvider->getImages(self::QUANTITY_IMAGES, $key));
    }
}
