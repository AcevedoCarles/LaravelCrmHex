<?php

namespace Hexa\Ambits\Application\Update;

use Hexa\Shared\Domain\Bus\Command\Command;

final class UpdateAmbitCommand implements Command
{
    private $id;
    private $unit_id;
    private $name;
    private $description;

    public function __construct(int $id, int $unit_id, string $name, string $description)
    {
        $this->id = $id;
        $this->unit_id = $unit_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function unit_id(): int
    {
        return $this->unit_id;
    }

    public function name(): int
    {
        return $this->name;
    }

    public function description(): int
    {
        return $this->description;
    }
}
