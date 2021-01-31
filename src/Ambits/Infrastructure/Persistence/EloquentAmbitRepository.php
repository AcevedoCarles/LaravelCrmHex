<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Infrastructure\Persistence;

use Hexa\Ambits\Domain\{ Ambit, AmbitRepository};
use App\Models\Ambit as AmbitEloquentModel;

final class EloquentAmbitRepository implements AmbitRepository
{
    public function save(Ambit $ambit): void
    {
        $model = new AmbitEloquentModel;
        $model->unit_id = $ambit->unit_id();
        $model->name = $ambit->name();
        $model->description = $ambit->description();

        $model->save();
    }

    public function find(int $id): ?Ambit
    {
        $model = AmbitEloquentModel::find($id);

        if( null === $model ) return null;

        return new Ambit($model->id, $model->unit_id, $model->name, $model->description);
    }

    public function update(Ambit $ambit): ?Ambit
    {
        $model = AmbitEloquentModel::find($ambit->id());

        $model->unit_id = $ambit->unit_id();
        $model->name = $ambit->name();
        $model->description = $ambit->description();

        $model->save();

        if( null === $model ) return null;

        return new Ambit($model->id, $model->unit_id, $model->name, $model->description);
    }

    public function searchAll(): array
    {
        return AmbitEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        AmbitEloquentModel::destroy($id);
    }
}
