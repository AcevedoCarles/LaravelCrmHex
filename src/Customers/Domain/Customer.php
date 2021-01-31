<?php

namespace Hexa\Customers\Domain;

final class Customer
{
    private $id;
    private $firstname;
    private $lastname;
    private $address;
    private $phone;
    private $cellphone;
    private $cif;
    private $birthdate;
    private $email;

    public function __construct(int $id, string $firstname, string $lastname, string $address, string $phone, string $cellphone, string $cif, string $birthdate, string $email)
    {
        $this->id = $id;
        $this->firstname = $this->setFirstname($firstname);
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
        $this->cellphone = $cellphone;
        $this->cif = $cif;
        $this->birthdate = $birthdate;
        $this->email = $email;
    }

    public static function create($firstname, $lastname, $address, $phone, $cellphone, $cif, $birthdate, $email): self
    {
        return new self(0001, $firstname, $lastname, $address, $phone, $cellphone, $cif, $birthdate, $email);
    }

    public static function update($id, $firstname, $lastname, $address, $phone, $cellphone, $cif, $birthdate, $email): self
    {
        return new self($id, $firstname, $lastname, $address, $phone, $cellphone, $cif, $birthdate, $email);
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

    public function address(): string
    {
        return $this->address;
    }

    public function phone(): string
    {
        return $this->phone;
    }

    public function cellphone(): string
    {
        return $this->cellphone;
    }

    public function cif(): string
    {
        return $this->cif;
    }

    public function birthdate(): string
    {
        return $this->birthdate;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function setFirstname(string $firstname): string
    {
        return ucfirst($firstname);
    }
}
