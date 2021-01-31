<?php

namespace Hexa\Customers\Application\Update;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Customers\Domain\{ Customer, CustomerRepository };

final class UpdateCustomerCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UpdateCustomerCommand $command)
    {
        $customer = Customer::update(
            $command->id(),
            $command->firstname(),
            $command->lastname(),
            $command->address(),
            $command->phone(),
            $command->cellphone(),
            $command->cif(),
            $command->birthdate(),
            $command->email()
        );

        $this->repository->update($customer);
    }
}
