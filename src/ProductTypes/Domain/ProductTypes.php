<?php

namespace Hexa\ProductTypes\Domain;

final class ProductTypes
{
    protected function type(): string
    {
        return ProductType::class;
    }
}
