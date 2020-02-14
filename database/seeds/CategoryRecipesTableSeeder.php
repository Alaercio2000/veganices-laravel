<?php

use Illuminate\Database\Seeder;

class CategoryRecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_recipes')->insert([
            [
                'name' => 'Aperitivos',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Bebidas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Bolos',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Doces',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Lanches',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Massas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Salgados',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'name' => 'Tortas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}
