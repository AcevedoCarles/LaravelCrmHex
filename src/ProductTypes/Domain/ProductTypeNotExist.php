<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Domain;

use Hexa\Shared\Domain\DomainError;

final class ProductTypeNotExist extends DomainError
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'product_type_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The product_type <%s> does not exist', $this->id);
    }
}
