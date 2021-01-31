<?php

declare(strict_types = 1);

namespace Hexa\Products\Infrastructure\Persistence;

use Hexa\Products\Domain\{ Product, ProductRepository};
use App\Models\Product as ProductEloquentModel;

final class EloquentProductRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        $model = new ProductEloquentModel;
        $model->customer_id = $product->customer_id();
        $model->product_type_id = $product->product_type_id();
        $model->identifier = $product->identifier();

        $model->save();
    }

    public function find(int $id): ?Product
    {
        $model = ProductEloquentModel::find($id);

        if( null === $model ) return null;

        return new Product($model->id, $model->customer_id, $model->product_type_id, $model->identifier);
    }

    public function update(Product $product): ?Product
    {
        $model = ProductEloquentModel::find($product->id());

        $model->customer_id = $product->customer_id();
        $model->product_type_id = $product->product_type_id();
        $model->identifier = $product->identifier();

        $model->save();

        if( null === $model ) return null;

        return new Product($model->id, $model->customer_id, $model->product_type_id, $model->identifier);
    }

    public function searchAll(): array
    {
        return ProductEloquentModel::with(['customer','product_types'])->get()->toArray();
    }

    public function delete(int $id): void
    {
        ProductEloquentModel::destroy($id);
    }
}
