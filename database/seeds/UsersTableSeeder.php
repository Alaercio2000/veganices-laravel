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
            [
                'name' => 'Alaercio',
                'email' => 'alaercio@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '1.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '2.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Edmar',
                'email' => 'edmar@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '3.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Meg',
                'email' => 'meg@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '4.jpg',
                'phone' => null,
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Teste provider',
                'email' => 'teste@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => null,
                'phone' => '(11) 9421-1231',
                'provider' => true,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
