<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class ProductTypesResponse implements Response
{
    private $product_types;

    public function __construct(ProductTypeResponse ...$product_types)
    {
        $this->product_types = $product_types;
    }

    public function product_types(): array
    {
        return $this->product_types;
    }
}
