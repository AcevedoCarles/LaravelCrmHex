<?php

declare(strict_types = 1);

namespace Hexa\Products\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class ProductsResponse implements Response
{
    private $products;

    public function __construct(ProductResponse ...$products)
    {
        $this->products = $products;
    }

    public function products(): array
    {
        return $this->products;
    }
}
