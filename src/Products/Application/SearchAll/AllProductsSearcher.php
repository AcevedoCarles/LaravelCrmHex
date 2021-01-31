<?php

declare(strict_types = 1);

namespace Hexa\Products\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\Products\Domain\ProductRepository;
use Hexa\Products\Application\{ ProductResponse, ProductsResponse };

final class AllProductsSearcher
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): ProductsResponse
    {
        return new ProductsResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($product) {
            return new ProductResponse($product['id'], $product['customer_id'], $product['product_type_id'], $product['identifier'], $product['customer'], $product['product_types']);
        };
    }
}
