<?php

namespace Hexa\Products\Domain;

final class Product
{
    private $id;
    private $customer_id;
    private $product_type_id;
    private $identifier;

    public function __construct(int $id, int $customer_id, int $product_type_id, string $identifier)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->product_type_id = $product_type_id;
        $this->identifier = $identifier;
    }

    public static function create( $customer_id,$product_type_id, $identifier): self
    {
        return new self(0001, $customer_id, $product_type_id, $identifier);
    }

    public static function update($id, $customer_id, $product_type_id, $identifier): self
    {
        return new self($id, $customer_id, $product_type_id, $identifier);
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
