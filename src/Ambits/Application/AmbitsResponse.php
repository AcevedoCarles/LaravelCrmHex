<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class AmbitsResponse implements Response
{
    private $ambits;

    public function __construct(AmbitResponse ...$ambits)
    {
        $this->ambits = $ambits;
    }

    public function ambits(): array
    {
        return $this->ambits;
    }
}
