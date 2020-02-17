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
            'name' => 'Acre',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Alagoas',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Amapá',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Amazonas',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Bahia',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Ceará',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Distrito Federal',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Espírito Santo',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Goiás',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Maranhão',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Mato Grosso',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Mato Grosso do Sul',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Minas Gerais',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Pará',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Paraíba',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Paraná',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Pernambuco',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Piauí',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Rio de Janeiro',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Rio Grande do Norte',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Rio Grande do Sul',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Rondônia',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Roraima',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Santa Catarina',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'São Paulo',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Sergipe',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ],
        [
            'name' => 'Tocantins',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]
    ]);
    }
}
