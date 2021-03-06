<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'firstname' => 'Mister', 'lastname' => 'Nobody', 'email' => 'admin@admin.com', 'email_verified_at' => now(),  'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10)]);

        DB::table('users')->insert([
            'firstname' => 'Antonio', 'lastname' => 'Rodriguez', 'email' => 'job@job.com', 'email_verified_at' => now(),  'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10)]);
        
    }
}
