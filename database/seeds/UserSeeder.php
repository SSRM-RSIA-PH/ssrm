<?php

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
        for ($i = 0; $i < 20; $i++) {
            \App\User::create([
                'name' => 'user'.$i,
                'username' => 'seed'.$i,
                'email' => 'usradm'.$i.'@ssrm.com',
                'role' => 'ADMIN',
                'password' => \Hash::make('1234567890')
            ]);
        }
    }
}
