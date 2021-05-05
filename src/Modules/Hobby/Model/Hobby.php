<?php

namespace App\Modules\Hobby\Model;

class Hobby
{
    private int $id;
    private string $title;
    private string $text;
    private array $images = [];

    public function __construct(int $id, string $title, string $text, array $images)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->setImages($images);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    public function getArray(): array
    {
        $result = [
            'id' => $this->id,
            'data' => [
                'caption' => $this->getTitle(),
                'text' => $this->getText(),
                'images' => $this->getImages()
            ]
        ];
        return $result;
    }
}