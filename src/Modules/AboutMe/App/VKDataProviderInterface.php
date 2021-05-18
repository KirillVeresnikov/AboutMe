<?php

namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\Model\User;

interface VKDataProviderInterface
{
    public function getUser(string $id): ?User;
}