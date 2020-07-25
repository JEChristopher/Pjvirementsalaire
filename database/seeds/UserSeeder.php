<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'first_name' => 'Christopher',
            'last_name' => 'Le dur',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@2020'),
            'is_active' => true,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
