<?php

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('units')->insert([
            'name' => 'Empresa 1']);
    	DB::table('units')->insert([
            'name' => 'Empresa 2']);
        factory(Unit::class, 20)->create();
    }
}
