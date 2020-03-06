<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_posts')->insert([
            [
                'user_id' => '1',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Sejam bem-vindos!',
                'content' => 'Olá pessoal! Sejam bem vindos ao nosso fórum!
                              Usem esse espaço para troca de informações sobre o veganismo. 
                              Encontre amigos, ajude e seja ajudado.',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '2',
                'type' => '1',
                'parent_id' => '1',
                'title' => 'Re: Sejam bem-vindos!',
                'content' => 'Muito boa a ideia do fórum! Vai nos ajudar muito :)',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '3',
                'type' => '1',
                'parent_id' => '1',
                'title' => 'Re: Sejam bem-vindos!',
                'content' => 'Uhuulll',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '1',
                'type' => '0',
                'parent_id' => '2',
                'title' => 'Apresente-se!',
                'content' => 'Bom pessoal, já demos as boas vindas no tópico anterior. Agora, aqui vamos nos apresentar!
                              Digam alguma coisa sobre vocês! Eu sou vegano há alguns meses apenas e tenho encontrado algumas dificuldades.. 
                              como toda mudança de hábito. Me chamo fulano de tal, tenho 25 anos e moro em São Paulo.',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '2',
                'type' => '1',
                'parent_id' => '2',
                'title' => 'Re: Apresente-se!',
                'content' => 'Oii, eu sou ciclana de tal.. tenho 20 anos, moro no ceará e estou começando a mudar a minha alimentção. 
                              Ainda sou ovolacto, mas pretendo parar totalmente com derivados de animais. 
                              Estou indo aos poucos e acho que o site vai me ajudar!',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '3',
                'type' => '1',
                'parent_id' => '2',
                'title' => 'Re: Apresente-se!',
                'content' => 'Meu nome é fulanito, sou vegano há anos e achei a proposta do site interessante. Gostei do fórum... 
                              espero ajudar a todos com a minha experiência de vida... mudar foi difícil no começo, mas com determinação
                              a gente alcança os resultados! Tudo pela vida!!!!!',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]
        ]);
    }
}
