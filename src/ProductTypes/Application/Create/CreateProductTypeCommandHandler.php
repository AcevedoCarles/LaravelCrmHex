<?php

namespace Hexa\ProductTypes\Application\Create;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\ProductTypes\Domain\{ ProductType, ProductTypeRepository };

final class CreateProductTypeCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateProductTypeCommand $command)
    {
        $product = ProductType::create(
            $command->unit_id(),
            $command->name(),
            $command->description(),
        );

        $this->repository->save($product);
    }
}
