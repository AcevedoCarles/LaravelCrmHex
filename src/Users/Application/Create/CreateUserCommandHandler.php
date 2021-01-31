<?php

namespace Hexa\Users\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Users\Domain\{ User, UserRepository };

final class CreateUserCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateUserCommand $command)
    {
        $user = User::create(
            $command->firstname(),
            $command->lastname(),
            $command->email(),
            $command->password()
        );

        $this->repository->save($user);
    }
}
