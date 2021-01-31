<?php

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'user_id' => 1, 'parent_id' => 1, 'unit_id' => 1, 'level' => 1]);
        DB::table('organizations')->insert([
            'user_id' => 2, 'parent_id' => 1, 'unit_id' => 1, 'level' => 1]);


        DB::table('organizations')->insert([
            'user_id' => 1, 'parent_id' => 1, 'unit_id' => 2, 'level' => 1]);
        DB::table('organizations')->insert([
            'user_id' => 2, 'parent_id' => 1, 'unit_id' => 2, 'level' => 1]);
    }
}
