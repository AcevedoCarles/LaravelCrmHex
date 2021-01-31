<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Ambits\Domain\AmbitNotExist;
use Hexa\Ambits\Application\Find\FindAmbitQuery;
use Hexa\Ambits\Application\Get\GetAmbitQuery;
use Hexa\Ambits\Application\Delete\DeleteAmbitQuery;
use Hexa\Ambits\Application\Update\UpdateAmbitCommand;
use Hexa\Ambits\Application\Create\CreateAmbitCommand;
use Hexa\Ambits\Application\SearchAll\SearchAllAmbitsQuery;

class AmbitController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            AmbitNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllAmbitsQuery);
        return response()->json($response->ambits());
    }

    public function create(Request $request)
    {
        $command = new CreateAmbitCommand(
            $request->unit_id,
            $request->name,
            $request->description
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Ambit created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateAmbitCommand(
            $id,
            $request->unit_id,
            $request->name,
            $request->description
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Ambit Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindAmbitQuery($id));
        return response()->json($response);
    }

    public function get(int $id)
    {
        $response = $this->ask(new GetAmbitQuery($id));
        return response()->json($response->ambits());
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteAmbitQuery($id));
        return response()
            ->json(['result' => 'Ambit deleted successfully'], Response::HTTP_OK);
    }
}
