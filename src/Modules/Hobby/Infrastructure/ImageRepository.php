<?php

namespace App\Modules\Hobby\Infrastructure;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

use App\Modules\Hobby\App\ImageRepositoryInterface;
use App\Modules\Hobby\Model\Image;

class ImageRepository implements ImageRepositoryInterface
{
    private EntityManagerInterface $manager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        $this->repository = $this->manager->getRepository(Image::class);
    }

    public function getImagesByTitle(string $title): ?array
    {
        $images = $this->repository->findBy([
            'title' => $title,
        ]);
        return empty($images) ? null : $images;
    }

    public function addImage(Image $image): void
    {
        $this->manager->persist($image);
        $this->manager->flush();
    }

    public function deleteImageByTitle(string $title): void
    {
        $images = $this->getImagesByTitle($title);
        if ($images !== null) {
            foreach ($images as $image)
            {
                $this->manager->remove($image);
                $this->manager->flush();            
            }
        }
    }

    public function updateImageByTitle(string $title, array $images): void
    {
        $this->deleteImageByTitle($title);
        foreach ($images as $image)
        {
            $this->addImage($image);
        }
    }
}