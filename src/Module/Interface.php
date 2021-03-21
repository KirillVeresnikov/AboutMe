<?php
namespace App\Module;

interface UserData
{
    public function getUser(string $id):? User;
}

interface AppSettings
{
    public function getValue(string $key):? string;
}

interface NotesData
{
    public function readNotes(): array;
}
