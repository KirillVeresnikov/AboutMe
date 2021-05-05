<?php

namespace App\Modules\Hobby\App;

interface ImageProviderInterface
{
    public static function getImages(int$count, string $theme): ?array;
}