<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application\Find;

use Hexa\ProductTypes\Application\ProductTypeResponse;
use Hexa\ProductTypes\Domain\{ ProductTypeNotExist, ProductTypeRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class FindProductTypeQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindProductTypeQuery $query): ProductTypeResponse
    {
        $product_types = $this->repository->find($query->id());

        $this->ensureProductTypeExists($query->id(), $product_types);

        return new ProductTypeResponse(
            $product_types->id(),
            $product_types->unit_id(),
            $product_types->name(),
            $product_types->description(),
        );
    }

    private function ensureProductTypeExists($id, $product_types)
    {
        if ( null === $product_types ) throw new ProductTypeNotExist($id);
    }
}

