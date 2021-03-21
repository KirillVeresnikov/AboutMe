<?php
namespace App\Module;

class User
{
    private string $first_name;
    private string $last_name;
    private string $bdate;
    private string $photo;
    private string $status;

    public function __construct(array $response)
    {
        $this -> first_name = $response[0]['first_name'];
        $this -> last_name = $response[0]['last_name'];
        $this -> bdate = $response[0]['bdate'];
        $this -> photo = $response[0]['photo_max'];
        $this -> status = $response[0]['status'];
    }

    public function getFirstName()
    {
        return $this -> first_name;
    }

    public function getLastName()
    {
        return $this -> last_name;
    }

    public function getBDate()
    {
        return $this -> bdate;
    }

    public function getPhoto()
    {
        return $this -> photo;
    }

    public function getStatus()
    {
        return $this -> status;
    }
}