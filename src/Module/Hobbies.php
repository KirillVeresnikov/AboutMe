<?php
namespace App\Module;

class Hobbies
{
    private array $list;

    public function addHobbie(string $caption, string $text): void
    {
        $this->list[] = new Hobbie($caption, $text);
        return;
    }

    public function getHobbies(): array
    {
        foreach ($this->list as $value)
        {
            $result[] = $value->getArray();
        }
        return $result;
    }
}