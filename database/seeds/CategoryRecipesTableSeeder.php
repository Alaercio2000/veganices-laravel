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
                'name' => 'Aperitivos'
            ],
            [
                'name' => 'Bebidas'
            ],
            [
                'name' => 'Bolos'
            ],
            [
                'name' => 'Doces'
            ],
            [
                'name' => 'Lanches'
            ],
            [
                'name' => 'Massas'
            ],
            [
                'name' => 'Salgados'
            ],
            [
                'name' => 'Tortas'
            ]
        ]);
    }
}
