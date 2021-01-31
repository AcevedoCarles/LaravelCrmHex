<?php

declare(strict_types = 1);

namespace Hexa\Organizations\Infrastructure\Persistence;

use Hexa\Organizations\Domain\{ Organization, OrganizationRepository};
use App\Models\Organization as OrganizationEloquentModel;

final class EloquentOrganizationRepository implements OrganizationRepository
{
    public function save(Organization $organization): void
    {
        $model = new OrganizationEloquentModel;
        $model->parent_id = $organization->parent_id();
        $model->user_id = $organization->user_id();
        $model->level = $organization->level();
        $model->unit_id = $organization->unit_id();

        $model->save();
    }

    public function find(int $id): ?Organization
    {
        $model = OrganizationEloquentModel::find($id);

        if( null === $model ) return null;

        return new Organization($model->id, $model->parent_id, $model->user_id, $model->level, $model->unit_id);
    }

    public function update(Organization $organization): ?Organization
    {
        $model = OrganizationEloquentModel::find($organization->id());

        $model->parent_id = $organization->parent_id();
        $model->user_id = $organization->user_id();
        $model->level = $organization->level();
        $model->unit_id = $organization->unit_id();

        $model->save();

        if( null === $model ) return null;

        return new Organization($model->id, $model->parent_id, $model->user_id, $model->level, $model->unit_id);
    }

    public function searchAll(): array
    {
        return OrganizationEloquentModel::all()->toArray();
    }

    public function get(int $id): array
    {
        return OrganizationEloquentModel::where('unit_id', $id)->with(['user','parent','unit'])->get()->toArray();
    }

    public function findByUser(int $id): array
    {
        return OrganizationEloquentModel::where('user_id', $id)->with(['user','parent','unit'])->get()->toArray();
    }

    public function delete(int $id): void
    {
        OrganizationEloquentModel::destroy($id);
    }
}
