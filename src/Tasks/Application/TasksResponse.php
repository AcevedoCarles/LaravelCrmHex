<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class TasksResponse implements Response
{
    private $tasks;

    public function __construct(TaskResponse ...$tasks)
    {
        $this->tasks = $tasks;
    }

    public function tasks(): array
    {
        return $this->tasks;
    }
}
