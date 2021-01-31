<?php

namespace Hexa\Users\Domain;

final class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct(int $id, string $firstname, string $lastname, string $email, string $password)
    {
        $this->id = $id;
        $this->firstname = $this->setFirstname($firstname);
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $this->setPassword($password);
    }

    public static function create($firstname, $lastname, $email, $password): self
    {
        return new self(0001, $firstname, $lastname, $email, $password);
    }

    public static function update($id, $firstname, $lastname, $email, $password): self
    {
        return new self($id, $firstname, $lastname, $email, $password);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function setFirstname(string $firstname): string
    {
        return ucfirst($firstname);
    }

    public function setPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
