<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Units\Domain\UnitNotExist;
use Hexa\Units\Application\Find\FindUnitQuery;
use Hexa\Units\Application\Delete\DeleteUnitQuery;
use Hexa\Units\Application\Update\UpdateUnitCommand;
use Hexa\Units\Application\Create\CreateUnitCommand;
use Hexa\Units\Application\SearchAll\SearchAllUnitsQuery;

class UnitController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            UnitNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllUnitsQuery);
        return response()->json($response->units());
    }

    public function create(Request $request)
    {
        $command = new CreateUnitCommand(
            $request->name
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Unit created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateUnitCommand(
            $id,
            $request->name
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Unit Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindUnitQuery($id));
        return response()->json($response);
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteUnitQuery($id));
        return response()
            ->json(['result' => 'Unit deleted successfully'], Response::HTTP_OK);
    }
}
