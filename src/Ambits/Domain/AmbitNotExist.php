<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Domain;

use Hexa\Shared\Domain\DomainError;

final class AmbitNotExist extends DomainError
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'ambit_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The ambit <%s> does not exist', $this->id);
    }
}
