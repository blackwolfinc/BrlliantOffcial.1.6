<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin Brilliant',
            'email' => 'admin3@brilliantofficial.com',
            'email_verified_at' => now(),
            'password' => bcrypt('5coA[('),
         ];
         DB::table('users')->insert($data);
    }
}
