<?php

use Illuminate\Database\Seeder;

class States_brazilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states_brazil')->insert([
        [
            'state' => 'AC',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'AL',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'AP',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'AM',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'BA',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'CE',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'DF',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'ES',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'GO',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'MA',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'MT',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'MS',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'MG',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'PA',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'PB',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'PR',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'PE',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'PI',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'RJ',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'RN',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'RS',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'RO',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'RR',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'SC',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'SP',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'SE',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'state' => 'TO',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]
    ]);
    }
}
