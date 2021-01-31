<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\ProductTypes\Domain\ProductTypeNotExist;
use Hexa\ProductTypes\Application\Find\FindProductTypeQuery;
use Hexa\ProductTypes\Application\Get\GetProductTypeQuery;
use Hexa\ProductTypes\Application\Delete\DeleteProductTypeQuery;
use Hexa\ProductTypes\Application\Update\UpdateProductTypeCommand;
use Hexa\ProductTypes\Application\Create\CreateProductTypeCommand;
use Hexa\ProductTypes\Application\SearchAll\SearchAllProductTypesQuery;

class ProductTypeController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            ProductTypeNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllProductTypesQuery);
        return response()->json($response->product_types());
    }

    public function create(Request $request)
    {
        $command = new CreateProductTypeCommand(
            $request->unit_id,
            $request->name,
            $request->description
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'ProductType created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateProductTypeCommand(
            $id,
            $request->unit_id,
            $request->name,
            $request->description
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'ProductType Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindProductTypeQuery($id));
        return response()->json($response);
    }

    public function get(int $id)
    {
        $response = $this->ask(new GetProductTypeQuery($id));
        return response()->json($response->products());
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteProductTypeQuery($id));
        return response()
            ->json(['result' => 'ProductType deleted successfully'], Response::HTTP_OK);
    }
}
