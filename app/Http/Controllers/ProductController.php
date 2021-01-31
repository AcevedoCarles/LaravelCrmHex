<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Products\Domain\ProductNotExist;
use Hexa\Products\Application\Find\FindProductQuery;
use Hexa\Products\Application\Get\GetProductQuery;
use Hexa\Products\Application\Delete\DeleteProductQuery;
use Hexa\Products\Application\Update\UpdateProductCommand;
use Hexa\Products\Application\Create\CreateProductCommand;
use Hexa\Products\Application\SearchAll\SearchAllProductsQuery;

class ProductController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            ProductNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllProductsQuery);
        return response()->json($response->products());
    }

    public function create(Request $request)
    {
        $command = new CreateProductCommand(
            $request->customer_id,
            $request->product_type_id,
            $request->identifier
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Product created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateProductCommand(
            $id,
            $request->customer_id,
            $request->product_type_id,
            $request->identifier
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Product Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindProductQuery($id));
        return response()->json($response);
    }

    public function get(int $id)
    {
        $response = $this->ask(new GetProductQuery($id));
        return response()->json($response->products());
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteProductQuery($id));
        return response()
            ->json(['result' => 'Product deleted successfully'], Response::HTTP_OK);
    }
}
