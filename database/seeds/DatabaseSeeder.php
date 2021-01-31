<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(AmbitSeeder::class);
        $this->call(ProductTypeSeeder::class);
    }
}
