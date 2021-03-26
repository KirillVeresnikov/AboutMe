<?php
namespace App\Module;

class User
{
    private string $firstName;
    private string $lastName;
    private string $birthDate;
    private string $photo;
    private string $status;

    public function __construct(string $firstName, string $lastName, string $birthDate, string $photo, string $status)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->photo = $photo;
        $this->status = $status;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}