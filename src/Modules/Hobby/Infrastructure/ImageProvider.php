<?php

namespace App\Modules\Hobby\Infrastructure;

use App\Modules\Hobby\App\ImageProviderInterface;
use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider implements ImageProviderInterface
{
    public static function getImages(int $count, string $theme): ?array
    {
        $urls = ImageSpider::find($theme);
        if (count($urls) >= $count)
        {
            $result = [];
            foreach (array_rand($urls, $count) as $index)
            {
                $result[] = $urls[$index];
            }

            return $result;
        }
        
        return null;
    }
}
