<?php

namespace Hexa\Organizations\Domain;

final class Organization
{
    private $id;
    private $parent_id;
    private $subject;
    private $level;
    private $unit_id;

    public function __construct(int $id, int $parent_id, int $user_id, int $level, int $unit_id)
    {
        $this->id = $id;
        $this->parent_id = $parent_id;
        $this->user_id = $user_id;
        $this->level = $level;
        $this->unit_id = $unit_id;
    }

    public static function create($parent_id, $user_id, $level, $unit_id): self
    {
        return new self(0001, $parent_id, $user_id, $level, $unit_id);
    }

    public static function update($id, $parent_id, $user_id, $level, $unit_id): self
    {
        return new self($id, $parent_id, $user_id, $level, $unit_id);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function parent_id(): int
    {
        return $this->parent_id;
    }

    public function user_id(): int
    {
        return $this->user_id;
    }

    public function level(): int
    {
        return $this->level;
    }

    public function unit_id(): int
    {
        return $this->unit_id;
    }
}
