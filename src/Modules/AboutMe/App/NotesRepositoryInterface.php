<?php

namespace App\Modules\AboutMe\App;

interface NotesRepositoryInterface
{
    public function getNotes(): array;
}