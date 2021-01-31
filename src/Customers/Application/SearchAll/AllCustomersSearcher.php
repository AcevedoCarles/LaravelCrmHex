<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\Customers\Domain\CustomerRepository;
use Hexa\Customers\Application\{ CustomerResponse, CustomersResponse };

final class AllCustomersSearcher
{
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): CustomersResponse
    {
        return new CustomersResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($customer) {
            return new CustomerResponse($customer['id'], $customer['firstname'], $customer['lastname'], $customer['address'], $customer['phone'], $customer['cellphone'], $customer['cif'], $customer['birthdate'], $customer['email']);
        };
    }
}
