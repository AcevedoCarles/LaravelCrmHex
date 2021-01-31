<?php

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('product_types')->insert([
            'unit_id' => 1, 'name' => 'Smartphone', 'description' => '']);
        
        DB::table('product_types')->insert([
            'unit_id' => 1, 'name' => 'Computer', 'description' => '']);
        
        DB::table('product_types')->insert([
            'unit_id' => 1, 'name' => 'Networking', 'description' => '']);
        

        DB::table('product_types')->insert([
            'unit_id' => 2, 'name' => 'Jeans', 'description' => '']);
        
        DB::table('product_types')->insert([
            'unit_id' => 2, 'name' => 'Shirts', 'description' => '']);
        
        DB::table('product_types')->insert([
            'unit_id' => 2, 'name' => 'Underwear', 'description' => '']);

    }
}
