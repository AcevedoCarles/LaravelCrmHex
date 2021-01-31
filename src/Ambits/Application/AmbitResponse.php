<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class AmbitResponse implements Response
{
    public function __construct(int $id, int $unit_id, string $name, string $description)
    {
        $this->unit_id = $unit_id;
        $this->name = $name;
        $this->description = $description;
    }
}

