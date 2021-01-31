<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Infrastructure\Persistence;

use Hexa\ProductTypes\Domain\{ ProductType, ProductTypeRepository};
use App\Models\ProductType as ProductTypeEloquentModel;

final class EloquentProductTypeRepository implements ProductTypeRepository
{
    public function save(ProductType $product_types): void
    {
        $model = new ProductTypeEloquentModel;
        $model->unit_id = $product_types->unit_id();
        $model->name = $product_types->name();
        $model->description = $product_types->description();

        $model->save();
    }

    public function find(int $id): ?ProductType
    {
        $model = ProductTypeEloquentModel::find($id);

        if( null === $model ) return null;

        return new ProductType($model->id, $model->unit_id, $model->name, $model->description);
    }

    public function update(ProductType $product_types): ?ProductType
    {
        $model = ProductTypeEloquentModel::find($product_types->id());

        $model->unit_id = $product_types->unit_id();
        $model->name = $product_types->name();
        $model->description = $product_types->description();

        $model->save();

        if( null === $model ) return null;

        return new ProductType($model->id, $model->unit_id, $model->name, $model->description);
    }

    public function searchAll(): array
    {
        return ProductTypeEloquentModel::all()->toArray();
    }

    public function delete(int $id): void
    {
        ProductTypeEloquentModel::destroy($id);
    }
}
