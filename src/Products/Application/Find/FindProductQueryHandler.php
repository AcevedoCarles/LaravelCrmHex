<?php

declare(strict_types = 1);

namespace Hexa\Products\Application\Find;

use Hexa\Products\Application\ProductResponse;
use Hexa\Products\Domain\{ ProductNotExist, ProductRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class FindProductQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindProductQuery $query): ProductResponse
    {
        $product = $this->repository->find($query->id());

        $this->ensureProductExists($query->id(), $product);

        return new ProductResponse(
            $product->id(),
            $product->customer_id(),
            $product->product_type_id(),
            $product->identifier(),
        );
    }

    private function ensureProductExists($id, $product)
    {
        if ( null === $product ) throw new ProductNotExist($id);
    }
}

