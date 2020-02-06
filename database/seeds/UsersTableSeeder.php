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
                'avatar' => '49242568.jpg',
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '11450997.jpg',
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Edmar',
                'email' => 'edmar@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '53894735.jpg',
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Meg',
                'email' => 'meg@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => '55217950.jpg',
                'provider' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Teste provider',
                'email' => 'teste@veganices.com.br',
                'password' => Hash::make('1234'),
                'avatar' => null,
                'provider' => true,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
