<?php

namespace Hexa\Products\Domain;

final class Products
{
    protected function type(): string
    {
        return Product::class;
    }
}
