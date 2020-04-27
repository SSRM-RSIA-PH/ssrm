<?php

use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'root',
            'email' => 'root@ssrm',
            'password' => \Hash::make('1sampai8'),
            'username' => 'root',
            'role' => 'SUPERVISOR',
        ]);
    }
}
