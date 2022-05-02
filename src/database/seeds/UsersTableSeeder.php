<?php

use Illuminate\Database\Seeder;

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
            'name'              => 'user',
            'email'             => 'user@email.com',
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
