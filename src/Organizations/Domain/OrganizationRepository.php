<?php

declare(strict_types = 1);

namespace Hexa\Organizations\Domain;

interface OrganizationRepository
{
    public function save(Organization $task): void;

    public function find(int $unit_id): ?Organization;

    public function searchAll(): array;

    public function delete(int $id): void;
}
