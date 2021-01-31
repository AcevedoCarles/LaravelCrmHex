<?php

namespace Hexa\Tasks\Application\Update;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Tasks\Domain\{ Task, TaskRepository };

final class UpdateTaskCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UpdateTaskCommand $command)
    {
        $task = Task::update(
            $command->id(),
            $command->name(),
            $command->subject(),
            $command->description(),
            $command->date(),
            $command->creator_id()
        );

        $this->repository->update($task);
    }
}
