<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Domain;

interface TaskRepository
{
    public function save(Task $task): void;

    public function find(int $id): ?Task;

    public function searchAll(): array;

    public function delete(int $id): void;
}
