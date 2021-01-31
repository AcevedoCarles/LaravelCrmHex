<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application\Delete;

use Hexa\Tasks\Application\TaskResponse;
use Hexa\Tasks\Domain\{ TaskNotExist, TaskRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class DeleteTaskQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteTaskQuery $query): void
    {
        $task = $this->repository->find($query->id());

        $this->ensureTaskExists($query->id(), $task);

        $this->repository->delete($query->id());
    }

    private function ensureTaskExists($id, $task)
    {
        if ( null === $task ) throw new TaskNotExist($id);
    }
}

