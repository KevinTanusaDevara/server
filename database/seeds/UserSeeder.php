<?php

use Illuminate\Database\Seeder;
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
            'name'      => 'Operator',
            'email'     => 'operator@gmail.com',
            'password'  => Hash::make('password'),
            'role_id'   => '1'
        ]);
        DB::table('users')->insert([
            'name'      => 'Pemilik',
            'email'     => 'pemilik@gmail.com',
            'password'  => Hash::make('password'),
            'role_id'   => '2'
        ]);
        DB::table('users')->insert([
            'name'      => 'Pegawai',
            'email'     => 'pegawai@gmail.com',
            'password'  => Hash::make('password'),
            'role_id'   => '3'
        ]);
    }
}
