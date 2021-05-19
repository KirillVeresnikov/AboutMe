<?php

namespace App\Modules\Hobby\App;

use App\Modules\Hobby\Model\Image;

interface ImageRepositoryInterface
{
    public function getImagesByTitle(string $title): ?array;
    public function addImage(Image $image): void;
    public function updateImageByTitle(string $title, array $images): void;
}