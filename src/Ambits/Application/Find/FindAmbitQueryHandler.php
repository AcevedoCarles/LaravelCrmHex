<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application\Find;

use Hexa\Ambits\Application\AmbitResponse;
use Hexa\Ambits\Domain\{ AmbitNotExist, AmbitRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class FindAmbitQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(AmbitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindAmbitQuery $query): AmbitResponse
    {
        $ambit = $this->repository->find($query->id());

        $this->ensureAmbitExists($query->id(), $ambit);

        return new AmbitResponse(
            $ambit->id(),
            $ambit->unit_id(),
            $ambit->name(),
            $ambit->description(),
        );
    }

    private function ensureAmbitExists($id, $ambit)
    {
        if ( null === $ambit ) throw new AmbitNotExist($id);
    }
}

