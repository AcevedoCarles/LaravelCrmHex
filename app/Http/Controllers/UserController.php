<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Users\Domain\UserNotExist;
use Hexa\Users\Application\Find\FindUserQuery;
use Hexa\Users\Application\Delete\DeleteUserQuery;
use Hexa\Users\Application\Update\UpdateUserCommand;
use Hexa\Users\Application\Create\CreateUserCommand;
use Hexa\Users\Application\SearchAll\SearchAllUsersQuery;

class UserController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            UserNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllUsersQuery);
        return response()->json($response->users());
    }

    public function create(Request $request)
    {
        $command = new CreateUserCommand(
            $request->firstname,
            $request->lastname,
            $request->email,
            $request->password
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'User created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateUserCommand(
            $id,
            $request->firstname,
            $request->lastname,
            $request->email,
            $request->password
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'User Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindUserQuery($id));
        return response()->json($response);
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteUserQuery($id));
        return response()
            ->json(['result' => 'User deleted successfully'], Response::HTTP_OK);
    }
}
