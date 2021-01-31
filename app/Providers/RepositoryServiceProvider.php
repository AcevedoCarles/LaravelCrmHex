<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Hexa\Users\Domain\UserRepository;
use Hexa\Users\Infrastructure\Persistence\EloquentUserRepository;

use Hexa\Tasks\Domain\TaskRepository;
use Hexa\Tasks\Infrastructure\Persistence\EloquentTaskRepository;

use Hexa\Customers\Domain\CustomerRepository;
use Hexa\Customers\Infrastructure\Persistence\EloquentCustomerRepository;

use Hexa\Units\Domain\UnitRepository;
use Hexa\Units\Infrastructure\Persistence\EloquentUnitRepository;

use Hexa\Organizations\Domain\OrganizationRepository;
use Hexa\Organizations\Infrastructure\Persistence\EloquentOrganizationRepository;

use Hexa\Ambits\Domain\AmbitRepository;
use Hexa\Ambits\Infrastructure\Persistence\EloquentAmbitRepository;

use Hexa\ProductTypes\Domain\ProductTypeRepository;
use Hexa\ProductTypes\Infrastructure\Persistence\EloquentProductTypeRepository;

use Hexa\Products\Domain\ProductRepository;
use Hexa\Products\Infrastructure\Persistence\EloquentProductRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            TaskRepository::class,
            EloquentTaskRepository::class
        );

        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            TaskRepository::class,
            EloquentTaskRepository::class
        );

        $this->app->bind(
            CustomerRepository::class,
            EloquentCustomerRepository::class
        );

        $this->app->bind(
            UnitRepository::class,
            EloquentUnitRepository::class
        );

        $this->app->bind(
            OrganizationRepository::class,
            EloquentOrganizationRepository::class
        );

        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            AmbitRepository::class,
            EloquentAmbitRepository::class
        );

        $this->app->bind(
            ProductTypeRepository::class,
            EloquentProductTypeRepository::class
        );

        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );
    }
}
