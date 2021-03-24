<?php
namespace App\Module;
use IvanUskov\ImageSpider\ImageSpider;

class Hobbie
{
    private string $caption;
    private string $text;

    public function __construct(string $caption, string $text)
    {
        $this->caption = $caption;
        $this->text = $text;
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getPhoto(): string
    {
        $images = ImageSpider::find($this->caption);
        return $images[rand(0, count($images) - 1)];
    }

    public function getArray(): array
    {
        $result = [
            'data' => [
                'caption' => $this->getCaption(),
                'text' => $this->getText(),
                'photo' => $this->getPhoto()
            ]
        ];
        return $result;
    }
}