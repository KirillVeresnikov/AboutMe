<?php 

namespace App\Modules\Hobby\App;

use App\Modules\Hobby\Model\Hobby;

interface HobbyRepositoryInterface
{
    public function getHobbies(): ?array;
    public function getHobbyById(int $id): ?Hobby;
    public function getHobbyByTitle(string $title): ?Hobby;
    public function addHobby(Hobby $hobby): void;
}