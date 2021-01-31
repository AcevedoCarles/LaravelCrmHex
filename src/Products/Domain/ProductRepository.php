<?php

declare(strict_types = 1);

namespace Hexa\Products\Domain;

interface ProductRepository
{
    public function save(Product $user): void;

    public function find(int $id): ?Product;

    public function searchAll(): array;

    public function delete(int $id): void;
}
