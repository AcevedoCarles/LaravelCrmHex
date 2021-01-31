<?php

namespace Hexa\Products\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\Products\Domain\{ Product, ProductRepository };

final class CreateProductCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateProductCommand $command)
    {
        $product = Product::create(
            $command->customer_id(),
            $command->product_type_id(),
            $command->identifier()
        );

        $this->repository->save($product);
    }
}
