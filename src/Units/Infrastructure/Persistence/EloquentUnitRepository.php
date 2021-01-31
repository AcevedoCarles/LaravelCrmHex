<?php

declare(strict_types = 1);

namespace Hexa\Units\Infrastructure\Persistence;

use Hexa\Units\Domain\{ Unit, UnitRepository};
use App\Models\Unit as UnitEloquentModel;

final class EloquentUnitRepository implements UnitRepository
{
    public function save(Unit $unit): void
    {
        $model = new UnitEloquentModel;
        $model->name = $unit->name();
        $model->img = $unit->img();

        $model->save();
    }

    public function find(int $id): ?Unit
    {
        $model = UnitEloquentModel::find($id);

        if( null === $model ) return null;

        return new Unit($model->id, $model->name, $model->img);
    }

    public function update(Unit $unit): ?Unit
    {
        $model = UnitEloquentModel::find($unit->id());

        $model->name = $unit->name();
        $model->img = $unit->img();

        $model->save();

        if( null === $model ) return null;

        return new Unit($model->id, $model->name, $model->img);
    }

    public function searchAll(): array
    {
        return UnitEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        UnitEloquentModel::destroy($id);
    }
}
