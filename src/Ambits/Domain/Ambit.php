<?php

namespace Hexa\Ambits\Domain;

final class Ambit
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

    public static function create($unit_id, $name, $description): self
    {
        return new self(0001, $unit_id, $name, $description);
    }

    public static function update($id, $unit_id, $name, $description): self
    {
        return new self($id, $unit_id, $name, $description);
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
