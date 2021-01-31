<?php

namespace Hexa\Products\Application\Update;

use Hexa\Shared\Domain\Bus\Command\Command;

final class UpdateProductCommand implements Command
{
    private $id;
    private $customer_id;
    private $product_type_id;
    private $identifier;

    public function __construct(int $id, int $customer_id, string $product_type_id, string $identifier)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->product_type_id = $product_type_id;
        $this->identifier = $identifier;
    }

    public function id(): int
    {
        return $this->id;
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
