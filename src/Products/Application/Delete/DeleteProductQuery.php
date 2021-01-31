<?php

declare(strict_types = 1);

namespace Hexa\Products\Application\Delete;

use Hexa\Shared\Domain\Bus\Query\Query;

final class DeleteProductQuery implements Query
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }
}

