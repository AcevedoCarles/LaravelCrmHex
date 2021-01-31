<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class ProductTypeResponse implements Response
{
    public function __construct(int $id, int $unit_id, string $name, string $description)
    {
        $this->id = $id;
        $this->unit_id = $unit_id;
        $this->name = $name;
        $this->description = $description;
    }
}

