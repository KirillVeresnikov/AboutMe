<?php

namespace App\Modules\AboutMe;

use App\Modules\AboutMe\Infrastructure\NotesRepository;
use App\Modules\AboutMe\Infrastructure\VKDataProvider;
use App\Modules\AboutMe\Model\VKUser;

class AboutMeService
{
    private VKDataProvider $vkData;
    private NotesRepository $notes;

    public function __construct()
    {
        $this->vkData = new VKDataProvider();
        $this->notes = new NotesRepository();
    }

    public function getUser(string $id): ?VKUser
    {
        return $this->vkData->getUser($id);
    }

    public function getNotes(): array
    {
        return $this->notes->getNotes();
    }
}