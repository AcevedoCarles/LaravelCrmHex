<?php

namespace Hexa\Ambits\Application\Update;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Ambits\Domain\{ Ambit, AmbitRepository };

final class UpdateAmbitCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(AmbitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UpdateAmbitCommand $command)
    {
        $ambit = Ambit::update(
            $command->id(),
            $command->unit_id(),
            $command->name(),
            $command->description(),
        );

        $this->repository->update($ambit);
    }
}
