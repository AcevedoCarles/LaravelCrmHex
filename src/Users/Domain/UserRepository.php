<?php

declare(strict_types = 1);

namespace Hexa\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;

    public function find(int $id): ?User;

    public function searchAll(): array;

    public function delete(int $id): void;
}
