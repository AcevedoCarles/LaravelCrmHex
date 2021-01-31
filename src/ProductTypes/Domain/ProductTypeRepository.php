<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Domain;

interface ProductTypeRepository
{
    public function save(ProductType $product_types): void;

    public function find(int $id): ?ProductType;

    public function searchAll(): array;

    public function delete(int $id): void;
}
