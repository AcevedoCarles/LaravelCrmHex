<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application\Delete;

use Hexa\Ambits\Application\AmbitResponse;
use Hexa\Ambits\Domain\{ AmbitNotExist, AmbitRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class DeleteAmbitQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(AmbitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteAmbitQuery $query): void
    {
        $ambit = $this->repository->find($query->id());

        $this->ensureAmbitExists($query->id(), $ambit);

        $this->repository->delete($query->id());
    }

    private function ensureAmbitExists($id, $ambit)
    {
        if ( null === $ambit ) throw new AmbitNotExist($id);
    }
}

