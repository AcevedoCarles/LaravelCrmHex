<?php

namespace Hexa\Products\Application\Update;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Products\Domain\{ Product, ProductRepository };

final class UpdateProductCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UpdateProductCommand $command)
    {
        $product = Product::update(
            $command->id(),
            $command->customer_id(),
            $command->product_type_id(),
            $command->identifier(),
        );

        $this->repository->update($product);
    }
}
