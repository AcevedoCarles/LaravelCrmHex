<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class CustomersResponse implements Response
{
    private $customers;

    public function __construct(CustomerResponse ...$customers)
    {
        $this->customers = $customers;
    }

    public function customers(): array
    {
        return $this->customers;
    }
}
