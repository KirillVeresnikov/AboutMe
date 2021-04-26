<?php
namespace App\Module;

class Hobbies
{
    private array $list;
    private int $index = 0;

    public function addHobbie(string $caption, string $text): void
    {
        $this->list[] = new Hobbie($this->index, $caption, $text);
        $this->index++;
        return;
    }

    public function getHobbies(): array
    {
        foreach ($this->list as $value)
        {
            $result[] = [
                'array' => $value->getArray(),
                'url' => '/hobbie/'.$value->getArray()['id']
            ];
        }
        return $result;
    }

    public function getHobbieById(int $id): Hobbie
    {
        foreach ($this->list as $value)
        {
            if ($value->getArray()['id'] === $id)
            {
                return $value;
            }
        }
    }
}