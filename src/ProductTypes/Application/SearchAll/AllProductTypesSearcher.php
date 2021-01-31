<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\ProductTypes\Domain\ProductTypeRepository;
use Hexa\ProductTypes\Application\{ ProductTypeResponse, ProductTypesResponse };

final class AllProductTypesSearcher
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): ProductTypesResponse
    {
        return new ProductTypesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($product_types) {
            return new ProductTypeResponse($product_types['id'], $product_types['unit_id'], $product_types['name'], $product_types['description']);
        };
    }
}
