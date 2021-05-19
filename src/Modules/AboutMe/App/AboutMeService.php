<?php

namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\App\NotesRepositoryInterface;
use App\Modules\AboutMe\App\VKDataProviderInterface;
use App\Modules\AboutMe\Model\User;

class AboutMeService
{
    private VKDataProviderInterface $vkData;
    private NotesRepositoryInterface $notes;

    public function __construct(VKDataProviderInterface $vk, NotesRepositoryInterface $notes)
    {
        $this->vkData = $vk;
        $this->notes = $notes;
    }

    public function getUser(string $id): ?User
    {
        return $this->vkData->getUser($id);
    }

    public function getNotes(): array
    {
        return $this->notes->getNotes();
    }
}