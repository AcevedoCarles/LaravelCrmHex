<?php

namespace Hexa\Tasks\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Tasks\Domain\{ Task, TaskRepository };

final class CreateTaskCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateTaskCommand $command)
    {
        $task = Task::create(
            $command->name(),
            $command->subject(),
            $command->description(),
            $command->date(),
            $command->creator_id()
        );

        $this->repository->save($task);
    }
}
