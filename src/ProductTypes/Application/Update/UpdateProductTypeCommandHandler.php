<?php

namespace Hexa\ProductTypes\Application\Update;

use Hexa\Shared\Domain\Bus\Command\CommandHandler;
use Hexa\ProductTypes\Domain\{ ProductType, ProductTypeRepository };

final class UpdateProductTypeCommandHandler implements CommandHandler
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UpdateProductTypeCommand $command)
    {
        $product = ProductType::update(
            $command->id(),
            $command->unit_id(),
            $command->name(),
            $command->description(),
        );

        $this->repository->update($product);
    }
}
