<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'provider_id'=> 1,
                'name' => 'Estronofe Vegano',
                'image' => '49242568.jpg',
                'ingredients' => '1 xícara de aveia,
                2 xícaras de água morna,
                1 fio de azeite,
                1/2 cebola picada,
                4 dentes de alho picado,
                300 g de palmito pupunha picado,
                100 g de cogumelos champignon fatiados,
                1 xícara de molho de tomate,
                2 colheres (sopa) de mostarda,
                1/2 xícara de salsinha,
                tomilho fresco a gosto,
                alecrim fresco a gosto,
                1/2 xícara de água,
                sal a gosto,
                pimenta-do-reino a gosto',
                'preparation_method' => 'Em uma tigela, misture a aveia com a água morna.Deixe de molho por 30 minutos. Em seguida, bata no liquidificador e reserve. Em uma frigideira, esquente 1 fio de azeite e refogue a cebola e o alho. Acrescente o palmito, os cogumelos, o molho de tomate, a mostarda e o creme de aveia reservado. Mexa bem e acrescente a salsinha, o tomilho e o alecrim fresco. Adicione a água e tempere com sal e pimenta-do-reino a gosto.',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}
