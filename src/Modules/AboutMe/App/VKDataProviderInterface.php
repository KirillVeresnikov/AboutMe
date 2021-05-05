<?php

namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\Model\VKUser;

interface VKDataProviderInterface
{
    public function getUser(string $id): ?VKUser;
}