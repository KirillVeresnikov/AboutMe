<?php
namespace App\Module;

interface VKDataProviderInterface
{
    public function getUser(string $id): ?User;
}