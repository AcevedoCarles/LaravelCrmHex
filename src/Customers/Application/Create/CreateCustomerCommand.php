<?php

namespace Hexa\Customers\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateCustomerCommand implements Command
{
    private $firstname;
    private $lastname;
    private $address;
    private $phone;
    private $cellphone;
    private $cif;
    private $birthdate;
    private $email;

    public function __construct( string $firstname, string $lastname, string $address, string $phone, string $cellphone, string $cif, string $birthdate, string $email)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
        $this->cellphone = $cellphone;
        $this->cif = $cif;
        $this->birthdate = $birthdate;
        $this->email = $email;
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

}
