<?php

namespace Hexa\Organizations\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateOrganizationCommand implements Command
{
    private $parent_id;
    private $user_id;
    private $level;
    private $unit_id;

    public function __construct( int $parent_id, int $user_id, int $level, int $unit_id)
    {
        $this->parent_id = $parent_id;
        $this->user_id = $user_id;
        $this->level = $level;
        $this->date = date("Y-m-d");
        $this->unit_id = $unit_id;
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

    public function date(): int
    {
        return $this->date;
    }

    public function unit_id(): int
    {
        return $this->unit_id;
    }
}
