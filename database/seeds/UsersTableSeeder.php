<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Adam Chambers',
            'email' => 'adammchambers@gmail.com',
            'password' => bcrypt('kilvington'),
        ]);

        factory(App\User::class, 5)->create();
    }
}
