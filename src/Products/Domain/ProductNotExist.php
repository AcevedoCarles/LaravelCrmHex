<?php

declare(strict_types = 1);

namespace Hexa\Products\Domain;

use Hexa\Shared\Domain\DomainError;

final class ProductNotExist extends DomainError
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'product_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The product <%s> does not exist', $this->id);
    }
}
