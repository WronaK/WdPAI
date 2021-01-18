<?php


class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $salt;
    private $role;

    public function __construct(string $email, string $password, string $name, string $surname, string $phone, string $salt)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPhone()
    {
        return $this->phone;
    }


}