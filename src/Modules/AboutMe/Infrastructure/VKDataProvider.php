<?php

namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\VKDataProviderInterface;
use App\Modules\AboutMe\Model\User;
use VK\Client\VKApiClient;

class VKDataProvider implements VKDataProviderInterface
{
    private string $key;
    private VKApiClient $client;

    public function __construct()
    {
        $this->key = $_ENV['vkKey'];
        $this->client = new VKApiClient();
    }

    public function getUser(string $id): ?User
    {
        $response = $this->client->users()->get($this->key, [
            'user_ids' => [$id],
            'fields'=> ['photo_max', 'status', 'bdate']
        ]);

        if (count($response) > 0)
        {
            $firstName = $response[0]['first_name'];
            $lastName = $response[0]['last_name'];
            $birthDate = $response[0]['bdate'];
            $photo = $response[0]['photo_max'];
            $status = $response[0]['status'];

            return new User($firstName, $lastName, $birthDate, $photo, $status);
        }
        else
        {
            return null;
        }
    }
}
