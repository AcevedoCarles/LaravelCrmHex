<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\Tasks\Domain\TaskRepository;
use Hexa\Tasks\Application\{ TaskResponse, TasksResponse };

final class AllTasksSearcher
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): TasksResponse
    {
        return new TasksResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($task) {
            return new TaskResponse($task['id'], $task['name'], $task['subject'], $task['description'], $task['date'], $task['creator_id']);
        };
    }
}
