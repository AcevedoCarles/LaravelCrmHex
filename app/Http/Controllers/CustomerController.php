<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Customers\Domain\CustomerNotExist;
use Hexa\Customers\Application\Find\FindCustomerQuery;
use Hexa\Customers\Application\Delete\DeleteCustomerQuery;
use Hexa\Customers\Application\Update\UpdateCustomerCommand;
use Hexa\Customers\Application\Create\CreateCustomerCommand;
use Hexa\Customers\Application\SearchAll\SearchAllCustomersQuery;

class CustomerController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            CustomerNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllCustomersQuery);
        return response()->json($response->customers());
    }

    public function create(Request $request)
    {
        $command = new CreateCustomerCommand(
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->phone,
            $request->cellphone,
            $request->cif,
            $request->birthdate,
            $request->email
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Customer created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateCustomerCommand(
            $id,
            $request->firstname,
            $request->lastname,
            $request->address,
            $request->phone,
            $request->cellphone,
            $request->cif,
            $request->birthdate,
            $request->email
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Customer Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindCustomerQuery($id));
        return response()->json($response);
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteCustomerQuery($id));
        return response()
            ->json(['result' => 'Customer deleted successfully'], Response::HTTP_OK);
    }
}
