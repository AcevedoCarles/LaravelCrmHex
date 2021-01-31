<?php

declare(strict_types = 1);

namespace Hexa\Users\Infrastructure\Persistence;

use Hexa\Users\Domain\{ User, UserRepository};
use App\Models\User as UserEloquentModel;

final class EloquentUserRepository implements UserRepository
{
    public function save(User $user): void
    {
        $model = new UserEloquentModel;
        $model->firstname = $user->firstname();
        $model->lastname = $user->lastname();
        $model->email = $user->email();
        $model->password = $user->password();

        $model->save();
    }

    public function find(int $id): ?User
    {
        $model = UserEloquentModel::find($id);

        if( null === $model ) return null;

        return new User($model->id, $model->firstname, $model->lastname, $model->email, $model->password);
    }

    public function update(User $user): ?User
    {
        $model = UserEloquentModel::find($user->id());

        $model->firstname = $user->firstname();
        $model->lastname = $user->lastname();
        $model->email = $user->email();
        $model->password = $user->password();

        $model->save();

        if( null === $model ) return null;

        return new User($model->id, $model->firstname, $model->lastname, $model->email, $model->password);
    }

    public function searchAll(): array
    {
        return UserEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        UserEloquentModel::destroy($id);
    }
}
