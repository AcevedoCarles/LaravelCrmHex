<?php

namespace Hexa\Ambits\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateAmbitCommand implements Command
{
    private $unit_id;
    private $name;
    private $description;

    public function __construct( int $unit_id, string $name, string $description)
    {
        $this->unit_id = $unit_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function unit_id(): int
    {
        return $this->unit_id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

}
