<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));


        // Auth
        Route::namespace($this->namespace)
            ->prefix('auth')
            ->group(base_path('routes/auth/auth.php'));

        // Users
        Route::namespace($this->namespace)
            ->prefix('users')
            ->group(base_path('routes/users/users.php'));

        // Tasks
        Route::namespace($this->namespace)
            ->prefix('tasks')
            ->group(base_path('routes/tasks/tasks.php'));

        // Customers
        Route::namespace($this->namespace)
            ->prefix('customers')
            ->group(base_path('routes/customers/customers.php'));

        // Customers
        Route::namespace($this->namespace)
            ->prefix('units')
            ->group(base_path('routes/units/units.php'));

        // Organizations
        Route::namespace($this->namespace)
            ->prefix('organizations')
            ->group(base_path('routes/organizations/organizations.php'));

        // Organizations
        Route::namespace($this->namespace)
            ->prefix('products')
            ->group(base_path('routes/products/products.php'));

        // Ambits
        Route::namespace($this->namespace)
            ->prefix('ambits')
            ->group(base_path('routes/ambits/ambits.php'));

        // Product Types
        Route::namespace($this->namespace)
            ->prefix('product_types')
            ->group(base_path('routes/product_types/product_types.php'));

    }
}
