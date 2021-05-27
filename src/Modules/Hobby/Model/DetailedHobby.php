<?php

namespace App\Modules\Hobby\Model;

use App\Modules\Hobby\Model\Hobby;
use App\Modules\Hobby\Model\Image;

class DetailedHobby
{
    private Hobby $hobby;
    private array $images;

    public function __construct(Hobby $hobby, array $images)
    {
        $this->hobby = $hobby;
        $this->images = $images;
    }

    public function getId(): int
    {
        return $this->hobby->getId();
    }
    
    public function getTitle(): string
    {
        return $this->hobby->getTitle();
    }

    public function getText(): string
    {
        return $this->hobby->getText();
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getImage(): ?Image
    {
        return $this->images[0];
    }
}