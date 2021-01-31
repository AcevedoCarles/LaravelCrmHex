<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Domain;

use Hexa\Shared\Domain\DomainError;

final class TaskNotExist extends DomainError
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'task_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The task <%s> does not exist', $this->id);
    }
}
