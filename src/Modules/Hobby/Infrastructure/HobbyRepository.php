<?php

namespace App\Modules\Hobby\Infrastructure;

use App\Modules\Hobby\App\HobbyRepositoryInterface;

class HobbyRepository implements HobbyRepositoryInterface
{
    public function getHobbyMap(): array
    {
        return [
            'Дрифт' => 'Информация про дрифт...',
            'Yo-Yo' => 'Информация про йо-йо...',
            'Велопутешествие' => 'Информация про велопутешествия...',
            'Фингерборд' => 'Информация про фингерборд...',
            'Музыка' => 'Информация про музыку...',
        ];
    }
}