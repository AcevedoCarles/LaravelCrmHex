<?php

namespace Hexa\Organizations\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Organizations\Domain\{ Organization, OrganizationRepository };

final class CreateOrganizationCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(OrganizationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateOrganizationCommand $command)
    {
        $task = Organization::create(
            $command->parent_id(),
            $command->user_id(),
            $command->level(),
            $command->unit_id()
        );

        $this->repository->save($task);
    }
}
