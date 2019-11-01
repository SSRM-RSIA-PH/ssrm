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
        for ($i = 49; $i < 101; $i++) {
            \App\User::create([
                'name' => 'user'.$i,
                'username' => 'usradm'.$i,
                'email' => 'usradm'.$i.'@ssrm.com',
                'role' => 'ADMIN',
                'password' => \Hash::make('1234567890')
            ]);
        }
    }
}
