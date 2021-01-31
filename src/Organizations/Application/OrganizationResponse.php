<?php

declare(strict_types = 1);

namespace Hexa\Organizations\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class OrganizationResponse implements Response
{
    public function __construct(int $id, int $parent_id, int $user_id, int $level, int $unit_id, $user, $parent, $unit)
    {
        $this->id = $id;
        $this->parent_id = $parent_id;
        $this->user_id = $user_id;
        $this->level = $level;
        $this->unit_id = $unit_id;
        $this->user = $user;
        $this->parent = $parent;
        $this->unit = $unit;
    }
}

