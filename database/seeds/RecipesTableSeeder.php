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
                'price' => 27.75,
                'stock' => 22,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

            [
                'provider_id'=> 1,
                'category_recipes_id' => 4,
                'name' => 'Mousse de Chocolate Vegano',
                'image' => 'mousse-chocolate.jpg',
                'ingredients' => '1 abacate maduro,
                2 colheres (sopa) de cacau em pó,
                1 pitada de canela em pó,
                4 colheres (sopa) de melado de cana,
                1 colher (chá) de essência de baunilha',
                'preparation_method' => 'No liquidificador, adicione o abacate, o cacau, a canela, o melado e a essência de baunilha.
                Bata bem e leve à geladeira por 2 horas.',
                'price' => 12.99,
                'stock' => 5,
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
                'price' => 17.50,
                'stock' => 12,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 2,
                'category_recipes_id' => 8,
                'name' => 'Empadão Vegano',
                'image' => 'empadao.jpg',
                'ingredients' => '240 g de palmito pupunha,
                150 g de vagem bem picadinha,
                1 lata de seleta de legumes,
                50 g de azeitona preta fatiada,
                100 g de cebola,
                30 ml de azeite,
                2 g de orégano,
                120 ml de água,
                1 colher (sopa) de amido de milho,
                sal a gosto,
                pimenta-do-reino a gosto',
                'preparation_method' => 'Para o recheio, refogue a cebola com azeite.Acrescente o palmito, a vagem, a cenoura e o orégano; cozinhe com a água até que fique ao dente. Tempere com sal e pimenta.
                Coloque o amido de milho dissolvido em um pouco de água, mexendo sempre até incorporar no recheio.
                Acrescente a azeitona e desligue o fogo.
                No processador, coloque o grão-de-bico, o azeite, sal, água e a cúrcuma; processe para misturar.
                Na tigela com a farinha de arroz, adicione a mistura e mexa com a ajuda das mãos até formar uma massa firme.
                Forre o fundo de pequenos recipientes com parte da massa.
                Coloque o recheio.
                Cubra com uma outra parte da massa.
                Leve forno preaquecido a 180° C por aproximadamente 30 minutos.',
                'price' => 25.90,
                'stock' => 8,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 2,
                'category_recipes_id' => 4,
                'name' => 'Brigadeiro Vegano',
                'image' => 'brigadeiro.jpg',
                'ingredients' => '1 e 1/2 xícara (chá) de batata doce cozida e amassada,
                2 colheres (sopa) de cacau em pó,
                1/3 de xícara (chá) de açúcar mascavo,
                1 colher (sobremesa) de óleo de coco',
                'preparation_method' => 'Em uma panela, misture a batata doce com os demais ingredientes.
                Leve ao fogo médio até que a mistura comece a desgrudar.
                Despeje em um prato e espere esfriar por completo.
                Deixe alguns minutos na geladeira (eu deixei 20) antes de enrolar.
                Faça bolinhas passe no granulado e sirva.
                Você pode passar em sementes como castanhas, avelãs, nozes e pistache.',
                'price' => 10.20,
                'stock' => 20,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 2,
                'category_recipes_id' => 5,
                'name' => 'Pão de Queijo Vegano',
                'image' => 'paoQueijo.jpg',
                'ingredients' => '2 xícaras de polvilho doce,
                1 xícara de polvilho azedo,
                1/3 xícara de óleo,
                2 xícaras de batata salsa amassada (tipo purê),
                1 xícara de água quente,
                sal a gosto,
                temperos a gosto (salsinha desidratada, ervas finas, alho desidratado, gergelim, linhaça)',
                'preparation_method' => 'Cozinhar em água fervente, a batata salsa já descascada.
                Reservar a água utilizada após o fervimento.
                Amassar as batatas, até a consistência de um purê.
                Em uma travessa, adicionar o polvilho azedo, o polvilho doce, o óleo, o sal e a água quente do fervimento das batatas.
                Misturar bem, podendo utilizar as próprias mãos, até virar uma massa uniforme.
                Acrescentar os temperos que preferir.
                Pode separar a massa em pedaços e acrescentar temperos diferentes para cada pedaço.
                Fazer bolinhas, de preferência pequenas, e coloque em uma assadeira antiaderente com espaço entre uma bolinha e outra, pois quase duplica de tamanho.
                Em forno preaquecido a 180°C, colocar seus pães de queijo veganos por aproximadamente 20 minutos, ou quanto achar necessário.',
                'price' => 15.50,
                'stock' => 20,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 2,
                'category_recipes_id' => 2,
                'name' => 'Leite de Amêndoas Vegano',
                'image' => 'leiteAmendoa.jpg',
                'ingredients' => '1 xícara de amêndoas,
                750 ml água,
                essência de baunilha,
                mel ou melado para adoçar',
                'preparation_method' => 'Lave as amêndoas e deixe de molho por uma noite com o dobro de água.
                Após ser hidratada, coloque no liquidificador com a água.
                Bata por 5 minutos e coe com o auxílio de uma peneira bem fina ou em tecido limpo.
                Adoce a gosto e coloque 3 gotas de essência de baunilha.',
                'price' => 9.30,
                'stock' => 5,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 1,
                'category_recipes_id' => 6,
                'name' => 'Risoto Vegano',
                'image' => 'risoto.jpg',
                'ingredients' => '1 xícara (chá) de arroz integral,
                300 g de legumes diversos (vagem, cenoura, ervilha, brócolis e couve-flor),
                100 g de champignon inteiros,
                100 g de azeitonas verdes sem caroço,
                3 pimentas (de sua preferência),
                azeite, sal e temperos frescos (orégano, tomilho, manjericão roxo e cheiro-verde) a gosto.',
                'preparation_method' => 'Pique as pimentas em pedaços bem pequenos e reserve.
                Cozinhe o arroz integral conforme as instruções do fabricante ou a sua preferência, juntamente com as pimentas picadas.
                Pique os legumes em cubinhos, cozinhando-os apenas com água.
                Após cozidos, escorra toda a água e reserve.
                Em uma panela, adicione um fio de azeite, os legumes cozidos, as azeitonas, os champignons, os temperos frescos e sal a gosto.
                Refogue-os bem até secar toda a água.
                Por fim, misture o arroz com os legumes refogados e sirva em seguida.',
                'price' => 25.50,
                'stock' => 10,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 1,
                'category_recipes_id' => 7,
                'name' => 'Purê de Cenoura Vegano',
                'image' => 'pure.jpg',
                'ingredients' => '3 cenouras grandes,
                1 e 1/2 copo de leite de coco,
                1/2 cebola,
                coentro a gosto,
                sal rosa a gosto,
                4 colheres (sopa) de farinha de arroz,
                1 colher de manteiga de coco',
                'preparation_method' => 'Em uma panela, cozinhe as cenouras por cerca de 12 minutos na pressão com sal, coentro ou outro condimento ao seu gosto.
                Após o cozimento, reserve.
                No liquidificador, coloque 1/2 cebola, 1 copo de leite de coco e a cenoura cozida e escorrida, mais um pouco de sal caso seja necessário para seu paladar.
                Bata até dar consistência, reserve.
                Em uma panela, coloque a manteiga, alho a gosto e cebola a gosto, refogue até dourar e após, coloque a mistura do liquidificador.
                O restante do leite e as quatro colheres de farinha de arroz, misture e adicione aos poucos na mistura da panela.
                Retire e coloque em um refratário, decore se desejar ou até polvilhe um pouco de queijo caso não seja vegano.
                A receita rende 15 porções medianas, sendo estas de 34 kcal por porção.',
                'price' => 10.70,
                'stock' => 10,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'provider_id'=> 1,
                'category_recipes_id' => 1,
                'name' => 'Patê de Tomate Vegano',
                'image' => 'pate.jpg',
                'ingredients' => '1/4 de xícara de azeite de oliva,
                1 cebola média em pedaços,
                3 tomates pequenos sem pele e sem sementes picados,
                4 fatias de pão de forma sem casca e esfareladas,
                1/4 de colher (chá) de sal,
                2 colheres (chá) de orégano,
                1/4 de colher (chá) de molho de pimenta,
                Ramos de orégano e gomos de tomate cereja a gosto',
                'preparation_method' => 'Em uma panela média, junte o azeite, a cebola, o tomate e refogue em fogo médio, mexendo algumas vezes até o tomate ficar macio.
                Deixe amornar, transfira para o liquidificador e bata até obter uma pasta. Junte o pão de forma e misture bem.
                Tempere com sal, orégano e molho de pimenta e mexa novamente. Coloque o patê em uma tigela pequena.
                Decore com os ramos de orégano e os gomos de tomate. Sirva em temperatura ambiente ou gelado.',
                'price' => 11.30,
                'stock' => 14,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}
