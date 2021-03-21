<?php
namespace App\Module;
use VK\Client\VKApiClient;

class VKDataProvider implements UserData
{
    private string $key;
    private $vk = null;

    public function __construct(string $key)
    {
        $this -> key = $key;
        $this -> vk = new VKApiClient();
    }

    public function getUser(string $id):? User
    {
        $response = $this -> vk -> users() -> get($this -> key, array(
            'user_ids' => array($id),
            'fields'=> array('photo_max', 'status', 'bdate')
        ));
        return new User($response);
    }
}