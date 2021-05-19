<?php

namespace App\Modules\Hobby\App;

interface ImageProviderInterface
{
    public function getImages(int $count, string $theme): ?array;
}