<?php

declare(strict_types = 1);

namespace Hexa\Products\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class ProductResponse implements Response
{
    public function __construct(int $id, int $customer_id, int $product_type_id, string $identifier, $customer, $product_types)
    {
        $this->customer_id = $customer_id;
        $this->product_type_id = $product_type_id;
        $this->identifier = $identifier;
        $this->customer = $customer;
        $this->product_types = $product_types;
    }
}

