<?php

namespace App\Modules\Hobby\Infrastructure;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

use App\Modules\Hobby\App\HobbyRepositoryInterface;
use App\Modules\Hobby\Model\Hobby;

class HobbyRepository implements HobbyRepositoryInterface
{
    private EntityManagerInterface $manager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        $this->repository = $this->manager->getRepository(Hobby::class);
    }

    public function getHobbyById(int $id): ?Hobby
    {
        $hobby = $this->repository->findOneBy([
            'id' => $id,
        ]);
        
        return empty($hobby) ? null : $hobby;
    }

    public function getHobbyByTitle(string $title): ?Hobby
    {
        $hobby = $this->repository->findOneBy([
            'title' => $title,
        ]);
        
        return empty($hobby) ? null : $hobby;
    }

    public function getHobbies(): ?array
    {
        $hobbies = $this->repository->findAll();
        return empty($hobbies) ? null : $hobbies;
    }

    public function addHobby(Hobby $hobby): void
    {
        $this->manager->persist($hobby);
        $this->manager->flush();
    }
}