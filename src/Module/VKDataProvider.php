<?php
namespace App\Module;
use VK\Client\VKApiClient;
use App\Module\Settings;

class VKDataProvider implements VKDataProviderInterface
{
    private string $key;
    private VKApiClient $vk;

    public function __construct()
    {
        $this->key = Settings::getValue('vk', 'vkKey');
        $this->vk = new VKApiClient();
    }

    public function getUser(string $id):? User
    {
        $response = $this->vk->users()->get($this->key, [
            'user_ids' => array($id),
            'fields'=> array('photo_max', 'status', 'bdate')
        ]);
        
        $firstName = $response[0]['first_name'];
        $lastName = $response[0]['last_name'];
        $birthDate = $response[0]['bdate'];
        $photo = $response[0]['photo_max'];
        $status = $response[0]['status'];

        return new User($firstName, $lastName, $birthDate, $photo, $status);
    }
}