<?php

declare(strict_types = 1);

namespace Hexa\Products\Application\Delete;

use Hexa\Products\Application\ProductResponse;
use Hexa\Products\Domain\{ ProductNotExist, ProductRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class DeleteProductQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteProductQuery $query): void
    {
        $product = $this->repository->find($query->id());

        $this->ensureProductExists($query->id(), $product);

        $this->repository->delete($query->id());
    }

    private function ensureProductExists($id, $product)
    {
        if ( null === $product ) throw new ProductNotExist($id);
    }
}

