<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application\Delete;

use Hexa\ProductTypes\Application\ProductTypeResponse;
use Hexa\ProductTypes\Domain\{ ProductTypeNotExist, ProductTypeRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class DeleteProductTypeQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteProductTypeQuery $query): void
    {
        $product_types = $this->repository->find($query->id());

        $this->ensureProductTypeExists($query->id(), $product_types);

        $this->repository->delete($query->id());
    }

    private function ensureProductTypeExists($id, $product_types)
    {
        if ( null === $product_types ) throw new ProductTypeNotExist($id);
    }
}

