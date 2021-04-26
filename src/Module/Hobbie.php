<?php
namespace App\Module;
use IvanUskov\ImageSpider\ImageSpider;

class Hobbie
{
    private int $id;
    private string $caption;
    private string $text;
    private array $photos;

    public function __construct(int $id, string $caption, string $text)
    {
        $this->id = $id;
        $this->caption = $caption;
        $this->text = $text;
        $this->setPhotos();
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setPhotos(): void
    {
        $images = ImageSpider::find($this->caption);
        shuffle($images);
        for ($i=0; $i < 4; ++$i) { 
            $this->photos[] = $images[$i]; 
        }
        return;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function getArray(): array
    {
        $result = [
            'id' => $this->id,
            'data' => [
                'caption' => $this->getCaption(),
                'text' => $this->getText(),
                'photos' => $this->getPhotos()
            ]
        ];
        return $result;
    }
}