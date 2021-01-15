<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Kamusi',
            'last_name' => 'App',
            'dobirth' => '01/01/2021',
            'gender' => 0,
            'about' => 'Happy to help',
            'town' => 'Nairobi',
            'country' => 'KE',
            'email' => 'admin@site.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@site'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}