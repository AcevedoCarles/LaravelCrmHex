<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Infrastructure\Persistence;

use Hexa\Tasks\Domain\{ Task, TaskRepository};
use App\Models\Task as TaskEloquentModel;

final class EloquentTaskRepository implements TaskRepository
{
    public function save(Task $task): void
    {
        $model = new TaskEloquentModel;
        $model->name = $task->name();
        $model->subject = $task->subject();
        $model->description = $task->description();
        $model->date = $task->date();
        $model->creator_id = $task->creator_id();

        $model->save();
    }

    public function find(int $id): ?Task
    {
        $model = TaskEloquentModel::find($id);

        if( null === $model ) return null;

        return new Task($model->id, $model->name, $model->subject, $model->description, $model->date, $model->creator_id);
    }

    public function update(Task $task): ?Task
    {
        $model = TaskEloquentModel::find($task->id());

        $model->name = $task->name();
        $model->subject = $task->subject();
        $model->description = $task->description();
        $model->date = $task->date();
        $model->creator_id = $task->creator_id();

        $model->save();

        if( null === $model ) return null;

        return new Task($model->id, $model->name, $model->subject, $model->description, $model->date, $model->creator_id);
    }

    public function searchAll(): array
    {
        return TaskEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        TaskEloquentModel::destroy($id);
    }
}
