<?php

namespace Hexa\Units\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateUnitCommand implements Command
{
    private $name;
    private $img;

    public function __construct( string $firstname, string $lastname)
    {
        $this->name = $name;
        $this->img = $img;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function img(): string
    {
        return $this->img;
    }
}
