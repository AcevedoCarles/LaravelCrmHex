<?php

namespace Hexa\Users\Application\Update;

use Hexa\Shared\Domain\Bus\Command\Command;

final class UpdateUserCommand implements Command
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct(int $id, string $firstname, string $lastname, string $email, string $password)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
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
}
