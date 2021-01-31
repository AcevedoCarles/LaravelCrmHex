<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application\Find;

use Hexa\Customers\Application\CustomerResponse;
use Hexa\Customers\Domain\{ CustomerNotExist, CustomerRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class FindCustomerQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindCustomerQuery $query): CustomerResponse
    {
        $customer = $this->repository->find($query->id());

        $this->ensureCustomerExists($query->id(), $customer);

        return new CustomerResponse(
            $customer->id(),
            $customer->firstname(),
            $customer->lastname(),
            $customer->address(),
            $customer->phone(),
            $customer->cellphone(),
            $customer->cif(),
            $customer->birthdate(),
            $customer->email()
        );
    }

    private function ensureCustomerExists($id, $customer)
    {
        if ( null === $customer ) throw new CustomerNotExist($id);
    }
}

