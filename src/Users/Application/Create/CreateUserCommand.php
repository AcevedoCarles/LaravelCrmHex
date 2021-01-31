<?php

namespace Hexa\Users\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct( string $firstname, string $lastname, string $email, string $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
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
}
