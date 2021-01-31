<?php

namespace Hexa\Products\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateProductCommand implements Command
{
    private $customer_id;
    private $product_type_id;
    private $identifier;

    public function __construct( int $customer_id, int $product_type_id, string $identifier)
    {
        $this->customer_id = $customer_id;
        $this->product_type_id = $product_type_id;
        $this->identifier = $identifier;
    }

    public function customer_id(): int
    {
        return $this->customer_id;
    }

    public function product_type_id(): int
    {
        return $this->product_type_id;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

}
