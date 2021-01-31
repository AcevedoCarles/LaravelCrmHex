<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application\Find;

use Hexa\Tasks\Application\TaskResponse;
use Hexa\Tasks\Domain\{ TaskNotExist, TaskRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class FindTaskQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindTaskQuery $query): TaskResponse
    {
        $task = $this->repository->find($query->id());

        $this->ensureTaskExists($query->id(), $task);

        return new TaskResponse(
            $task->id(),
            $task->name(),
            $task->subject(),
            $task->description(),
            $task->date(),
            $task->creator_id()
        );
    }

    private function ensureTaskExists($id, $task)
    {
        if ( null === $task ) throw new TaskNotExist($id);
    }
}

