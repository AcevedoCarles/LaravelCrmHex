<?php

declare(strict_types = 1);

namespace Hexa\Customers\Domain;

interface CustomerRepository
{
    public function save(Customer $user): void;

    public function find(int $id): ?Customer;

    public function searchAll(): array;

    public function delete(int $id): void;
}
