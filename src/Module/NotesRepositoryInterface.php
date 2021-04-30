<?php
namespace App\Module;

interface NotesRepositoryInterface
{
    public function getNotes(): array;
}