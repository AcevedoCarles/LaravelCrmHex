<?php

declare(strict_types = 1);

namespace Hexa\Users\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class UserResponse implements Response
{
    public function __construct(int $id, string $firstname, string $lastname, string $email)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }
}

