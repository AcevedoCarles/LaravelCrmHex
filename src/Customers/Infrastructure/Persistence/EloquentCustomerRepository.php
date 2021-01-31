<?php

declare(strict_types = 1);

namespace Hexa\Customers\Infrastructure\Persistence;

use Hexa\Customers\Domain\{ Customer, CustomerRepository};
use App\Models\Customer as CustomerEloquentModel;

final class EloquentCustomerRepository implements CustomerRepository
{
    public function save(Customer $customer): void
    {
        $model = new CustomerEloquentModel;
        $model->firstname = $customer->firstname();
        $model->lastname = $customer->lastname();
        $model->address = $customer->address();
        $model->phone = $customer->phone();
        $model->cellphone = $customer->cellphone();
        $model->cif = $customer->cif();
        $model->birthdate = $customer->birthdate();
        $model->email = $customer->email();

        $model->save();
    }

    public function find(int $id): ?Customer
    {
        $model = CustomerEloquentModel::find($id);

        if( null === $model ) return null;

        return new Customer($model->id, $model->firstname, $model->lastname, $model->address, $model->phone, $model->cellphone, $model->cif, $model->birthdate, $model->email);
    }

    public function update(Customer $customer): ?Customer
    {
        $model = CustomerEloquentModel::find($customer->id());

        $model->firstname = $customer->firstname();
        $model->lastname = $customer->lastname();
        $model->address = $customer->address();
        $model->phone = $customer->phone();
        $model->cellphone = $customer->cellphone();
        $model->cif = $customer->cif();
        $model->birthdate = $customer->birthdate();
        $model->email = $customer->email();

        $model->save();

        if( null === $model ) return null;

        return new Customer($model->id, $model->firstname, $model->lastname, $model->address, $model->phone, $model->cellphone, $model->cif, $model->birthdate, $model->email);
    }

    public function searchAll(): array
    {
        return CustomerEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        CustomerEloquentModel::destroy($id);
    }
}
