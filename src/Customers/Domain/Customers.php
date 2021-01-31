<?php

namespace Hexa\Customers\Domain;

final class Customers
{
    protected function type(): string
    {
        return Customer::class;
    }
}
