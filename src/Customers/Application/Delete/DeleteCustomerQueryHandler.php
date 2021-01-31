<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application\Delete;

use Hexa\Customers\Application\CustomerResponse;
use Hexa\Customers\Domain\{ CustomerNotExist, CustomerRepository };
use Hexa\Shared\Domain\Bus\Query\QueryHandler;

final class DeleteCustomerQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteCustomerQuery $query): void
    {
        $customer = $this->repository->find($query->id());

        $this->ensureCustomerExists($query->id(), $customer);

        $this->repository->delete($query->id());
    }

    private function ensureCustomerExists($id, $customer)
    {
        if ( null === $customer ) throw new CustomerNotExist($id);
    }
}

