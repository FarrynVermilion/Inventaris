<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Schema\Blueprint;
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
            'name' => 'Admin',
            'email' => 'admin@nowui.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Reynal',
            'email' => 'anandareynalw@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('papantulis'),
            'role' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'test user',
            'email' => 'tester@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('blackbox'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
