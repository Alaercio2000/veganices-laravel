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
                'provider_id' => 1,
                'category_recipes_id' => 7,
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
                'price' => 57.75,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'provider_id'=> 1,
                'category_recipes_id' => 4,
                'name' => 'Mousse de Chocolate Vegano',
                'image' => 'mousse-vegano.jpg',
                'ingredients' => '1 abacate maduro,
                2 colheres (sopa) de cacau em pó,
                1 pitada de canela em pó,
                4 colheres (sopa) de melado de cana,
                1 colher (chá) de essência de baunilha',
                'preparation_method' => 'No liquidificador, adicione o abacate, o cacau, a canela, o melado e a essência de baunilha.
                Bata bem e leve à geladeira por 2 horas.',
                'price' => 92.99,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'provider_id'=> 1,
                'category_recipes_id' => 3,
                'name' => 'Bolo de Cenoura Vegano',
                'image' => 'bolo-de-cenoura.jpg',
                'ingredients' => 'Bolo:,
                3 cenouras em pedaços,
                suco de 2 laranjas,
                1/2 copo de óleo,
                1 copo de açúcar,
                3 copos de farinha de trigo,
                1 colher de sopa de fermento químico,
                Cobertura:,
                200 ml de leite de coco
                7 colheres de sopa de cacau em pó
                7 colheres de sopa de açucar',
                'preparation_method' => 'Bolo: No liquidificador bata todos os ingredientes, exceto a farinha de trigo e o fermento, que devem ser colocados em um recipiente à parte, e misturados com uma colher de pau aos ingredientes já batidos do liquidificador.
                Unte uma forma com óleo e polvilhe farinha de trigo.
                Despeje a massa do bolo que deve estar uniforme.
                Ingredientes: Em uma panelinha misture todos os ingredientes, leve ao fogo até que forme uma calda lisa, sem pedaços.
                Reserve a calda e a despeje sobre o bolo tão logo o tire do forno.',
                'price' => 157.00,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}
