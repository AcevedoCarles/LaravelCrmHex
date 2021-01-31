<?php

namespace Hexa\Ambits\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Ambits\Domain\{ Ambit, AmbitRepository };

final class CreateAmbitCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(AmbitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateAmbitCommand $command)
    {
        $product = Ambit::create(
            $command->unit_id(),
            $command->name(),
            $command->description()
        );

        $this->repository->save($product);
    }
}
