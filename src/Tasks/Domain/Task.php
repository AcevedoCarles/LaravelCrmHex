<?php

namespace Hexa\Tasks\Domain;

final class Task
{
    private $id;
    private $name;
    private $subject;
    private $description;
    private $date;
    private $creator_id;

    public function __construct(int $id, string $name, string $subject, string $description, string $date, int $creator_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
        $this->description = $description;
        $this->date = $date;
        $this->creator_id = $creator_id;
    }

    public static function create($name, $subject, $description, $date, $creator_id): self
    {
        return new self(0001, $name, $subject, $description, $date, $creator_id);
    }

    public static function update($id, $name, $subject, $description, $date, $creator_id): self
    {
        return new self($id, $name, $subject, $description, $date, $creator_id);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function date(): string
    {
        return $this->date;
    }

    public function creator_id(): int
    {
        return $this->creator_id;
    }
}
