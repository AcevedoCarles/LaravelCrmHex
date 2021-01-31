<?php

namespace Hexa\Customers\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Customers\Domain\{ Customer, CustomerRepository };

final class CreateCustomerCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCustomerCommand $command)
    {
        $customer = Customer::create(
            $command->firstname(),
            $command->lastname(),
            $command->address(),
            $command->phone(),
            $command->cellphone(),
            $command->cif(),
            $command->birthdate(),
            $command->email()
        );

        $this->repository->save($customer);
    }
}
