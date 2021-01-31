<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Organizations\Domain\OrganizationNotExist;
use Hexa\Organizations\Application\Find\FindOrganizationQuery;
use Hexa\Organizations\Application\Get\GetOrganizationQuery;
use Hexa\Organizations\Application\FindByUser\FindByUserOrganizationQuery;
use Hexa\Organizations\Application\Delete\DeleteOrganizationQuery;
use Hexa\Organizations\Application\Update\UpdateOrganizationCommand;
use Hexa\Organizations\Application\Create\CreateOrganizationCommand;
use Hexa\Organizations\Application\SearchAll\SearchAllOrganizationsQuery;

use Auth;

class OrganizationController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            OrganizationNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllOrganizationsQuery);
        return response()->json($response->organizations());
    }

    public function create(Request $request)
    {
        $command = new CreateOrganizationCommand(
            $request->parent_id,
            $request->user_id,
            $request->level,
            $request->unit_id
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Organization created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateOrganizationCommand(
            $id,
            $request->parent_id,
            $request->user_id,
            $request->level,
            $request->unit_id
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Organization Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindOrganizationQuery($id));
        return response()->json($response);
    }

    public function findByUser(int $id)
    {
        $response = $this->ask(new FindByUserOrganizationQuery($id));
        return response()->json($response->organizations());
    }

    public function mine()
    {
        $response = $this->ask(new FindByUserOrganizationQuery(Auth::user()->id));
        return response()->json($response->organizations());
    }

    public function get(int $id)
    {
        $response = $this->ask(new GetOrganizationQuery($id));
        return response()->json($response->organizations());
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteOrganizationQuery($id));
        return response()
            ->json(['result' => 'Organization deleted successfully'], Response::HTTP_OK);
    }
}
