<?php
namespace App\Module;

use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider
{
    public static function getPhotos(string $theme)
    {
        $images = ImageSpider::find($theme);
        $result = [];
        shuffle($images);

        for ($i=0; $i < 4; ++$i)
        { 
            $result[] = $images[$i]; 
        }

        return $result;
    }
}