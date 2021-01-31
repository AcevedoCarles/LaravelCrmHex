<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class CustomerResponse implements Response
{
    public function __construct(int $id, string $firstname, string $lastname, string $address, string $phone, string $cellphone, string $cif, string $birthdate, string $email)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
        $this->cellphone = $cellphone;
        $this->cif = $cif;
        $this->birthdate = $birthdate;
        $this->email = $email;
    }
}

