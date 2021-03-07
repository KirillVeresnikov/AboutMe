<?php
    use VK\Client\VKApiClient;

    function getUser(string $token, string $id)
    {
        $vk = new VKApiClient();
        $responce = $vk->users()->get($token, array(
            'user_ids' => array($id),
            'fields'=> array('photo_max', 'status')
        ));
        return $responce;
    }