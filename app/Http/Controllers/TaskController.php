<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Hexa\Shared\Infrastructure\Api\Controller\BaseController;
use Hexa\Tasks\Domain\TaskNotExist;
use Hexa\Tasks\Application\Find\FindTaskQuery;
use Hexa\Tasks\Application\Delete\DeleteTaskQuery;
use Hexa\Tasks\Application\Update\UpdateTaskCommand;
use Hexa\Tasks\Application\Create\CreateTaskCommand;
use Hexa\Tasks\Application\SearchAll\SearchAllTasksQuery;

class TaskController extends BaseController
{
    protected function exceptions(): array
    {
        return [
            TaskNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }


    public function all()
    {
        $response = $this->ask(new SearchAllTasksQuery);
        return response()->json($response->tasks());
    }

    public function create(Request $request)
    {
        $command = new CreateTaskCommand(
            $request->name,
            $request->subject,
            $request->description,
            $request->date,
            $request->creator_id
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Task created successfully'], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {

        $command = new UpdateTaskCommand(
            $id,
            $request->name,
            $request->subject,
            $request->description,
            $request->date,
            $request->creator_id
        );

        $this->execute($command);

        return response()
            ->json(['result' => 'Task Update successfully'], Response::HTTP_OK);
    }

    public function find(int $id)
    {
        $response = $this->ask(new FindTaskQuery($id));
        return response()->json($response);
    }

    public function delete(int $id)
    {
        $response = $this->ask(new DeleteTaskQuery($id));
        return response()
            ->json(['result' => 'Task deleted successfully'], Response::HTTP_OK);
    }
}
