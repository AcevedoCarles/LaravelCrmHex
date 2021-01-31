<?php

namespace Hexa\ProductTypes\Application\Update;

use Hexa\Shared\Domain\Bus\Command\Command;

final class UpdateProductTypeCommand implements Command
{
    private $id;
    private $unit_id;
    private $name;
    private $description;

    public function __construct(int $id, int $unit_id, int $ambit_id, string $name, string $description)
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

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }
}
