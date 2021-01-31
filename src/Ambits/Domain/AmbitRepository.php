<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Domain;

interface AmbitRepository
{
    public function save(Ambit $ambit): void;

    public function find(int $id): ?Ambit;

    public function searchAll(): array;

    public function delete(int $id): void;
}
