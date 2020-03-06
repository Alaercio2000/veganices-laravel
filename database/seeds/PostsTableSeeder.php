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
            // post 1
            [
                'user_id' => '2',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Sejam bem-vindos!',
                'content' => 'Olá pessoal! Sejam bem vindos ao nosso fórum!
                              Usem esse espaço para troca de informações sobre o veganismo. 
                              Encontre amigos, ajude e seja ajudado.',
                'created_at' => '2020-03-01 12:37:50',
                'updated_at' => NOW(),
            ],
            //respostas post 1
            [
                'user_id' => '12',
                'type' => '1',
                'parent_id' => '1',
                'title' => 'Re: Sejam bem-vindos!',
                'content' => 'Muito boa a ideia do fórum! Vai nos ajudar muito :)',
                'created_at' => '2020-03-01 15:04:50',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '3',
                'type' => '1',
                'parent_id' => '1',
                'title' => 'Re: Sejam bem-vindos!',
                'content' => 'Uhuulll',
                'created_at' => '2020-03-01 15:17:33',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '17',
                'type' => '1',
                'parent_id' => '1',
                'title' => 'Re: Sejam bem-vindos!',
                'content' => 'Contem comigo! Espero poder ajudar todos por aqui :D',
                'created_at' => '2020-03-01 20:27:23',
                'updated_at' => NOW(),
            ],
            //post 2
            [
                'user_id' => '14',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Apresente-se!',
                'content' => 'Bom pessoal, já demos as boas vindas no tópico anterior. Agora, aqui vamos nos apresentar!
                              Digam alguma coisa sobre vocês! Eu me chamo Isabelly, tenho 30 anos. Moro em São Paulo e já sou vegana há 3 anos :)
                              Se precisarem de dicas estou a disposição ;)',
                'created_at' => '2020-03-01 23:00:13',
                'updated_at' => NOW(),
            ],
            //respostas post 2
            [
                'user_id' => '6',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Boa noite, me chamo Maria Lúcia, tenho 40 anos e estou começando a mudar a minha alimentção agora. 
                              Deixei de comer carne, mas ainda consumo alguns derivados animais. Estou aqui para ver as receitas
                              e ter ideias legais para a substituição da proteína. Conto com a ajuda de todos nessa jornada rumo ao veganismo!!',
                'created_at' => '2020-03-01 23:27:15',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '8',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Meu nome é Marco Antonio, sou vegano há anos e achei a proposta do site interessante. Gostei do fórum... 
                              espero ajudar a todos com a minha experiência de vida... mudar foi difícil no começo, mas com determinação
                              a gente alcança os resultados! Tudo pela vida!!!!!',
                'created_at' => '2020-03-01 23:30:29',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '13',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Eu sou o Lucas, sou adepto ao veganismo faz poucos dias. Decidi parar de comer carne depois de ver
                              alguns documentários sobre a indústria frigorifica, é muita crueldade com os animais! Fora todos os
                              impactos ambientais causados por todo o processo pela qual o animal passa. Estou aqui para aprender mais
                              sobre o estilo de vida vegano e aprender umas receitas novas também!',
                'created_at' => '2020-03-01 23:40:18',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '10',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Me chamo Victória, mas podem me chamar de Vic! Tenho 23 anos, moro em São Paulo. Fui influenciada
                              a virar vegana pelos meus amigos... eles me mostraram como a alimentação vegetariana pode ser muito
                              gostosa e sem qualquer crueldade contra os animais.',
                'created_at' => '2020-03-01 23:42:39',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '15',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Estou muito feliz de poder participar dessa comunidade! Eu sou o Enzo e virei ovolactovegetariano há mais ou menos 
                              1 ano. Agora eu quero tirar todos os derivados animais da minha alimentação e acho que as receitas do site
                              vão me ajudar muito :D',
                'created_at' => '2020-03-01 23:56:44',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '17',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Me chamo Luana e comecei a cortar a carne da minha alimentação faz apenas 3 meses. Ainda tenho dificuldades,
                              mas estou firme na caminhada! Espero me manter motivada com a ajuda de vcs! Podem me dar dicas de 
                              comidinhas gostosas ;)',
                'created_at' => '2020-03-02 10:23:23',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '11',
                'type' => '1',
                'parent_id' => '5',
                'title' => 'Re: Apresente-se!',
                'content' => 'Me chamo Gabriela, sou casada, sou mãe e tenho uma família linda!!! Eu e meu marido aderimos ao veganismo
                              logo depois que nos casamos. Nossa filha de 3 anos ainda não experimentou nada de origem animal, estamos ensinando
                              a ela sobre o veganismo desde cedo.',
                'created_at' => '2020-03-02 14:14:55',
                'updated_at' => NOW(),
            ],
            //post 3
            [
                'user_id' => '12',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Dicas para quem está começando no veganismo',
                'content' => 'Oi pessoal!! Gostaria que me dessem dicas para continuar firme na busca de uma vida vegana!!
                              Decidi me tormar vegana, mas eu ainda não consegui largar os laticineos e nem o peixe :(
                              Existe alguma substituição bacana pra eles?',
                'created_at' => '2020-03-03 12:00:13',
                'updated_at' => NOW(),
            ],
            //respostas post 3
            [
                'user_id' => '6',
                'type' => '1',
                'parent_id' => '13',
                'title' => 'Re: Dicas para quem está começando no veganismo!',
                'content' => 'Também gostia de saber!!',
                'created_at' => '2020-03-03 13:27:15',
                'updated_at' => NOW(),
            ],
            //post 4
            [
                'user_id' => '16',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Curiosidade',
                'content' => 'Veganos vão a museus? Por exemplo, que há fósseis de animais. Obs: é uma curiosidade real.',
                'created_at' => '2020-03-03 21:44:57',
                'updated_at' => NOW(),
            ],
            //respostas post 4
            [
                'user_id' => '1',
                'type' => '1',
                'parent_id' => '15',
                'title' => 'Re: Curiosidade',
                'content' => 'Boa pergunta!',
                'created_at' => '2020-03-03 22:07:29',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '8',
                'type' => '1',
                'parent_id' => '15',
                'title' => 'Re: Curiosidade',
                'content' => 'Sim, não tem nada contra já que não houve exploração ou assassinato desses animais.',
                'created_at' => '2020-03-03 22:12:35',
                'updated_at' => NOW(),
            ],
            //post 5
            [
                'user_id' => '7',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'As receitas do site',
                'content' => 'Pessoal, as receitas que vcs compram aqui no site dão certo?? Ainda não comprei nenhuma e gostaria de saber
                              a opinião de alguém que já tenha comprado aqui.......',
                'created_at' => '2020-03-04 08:44:57',
                'updated_at' => NOW(),
            ],
            //respostas post 15
            [
                'user_id' => '9',
                'type' => '1',
                'parent_id' => '18',
                'title' => 'Re: As receitas do site',
                'content' => 'Mano, não tem como errar! Eles mandam a quantidade de ingredientes exatamente igual a da receita.
                              Só seguir o passo a passo e já é! Facilitou muito a minha vida.. Sou muito desorganizado pra cozinhar e
                              agora consigo fazer pratos digno de chef!! ;D',
                'created_at' => '2020-03-03 22:12:35',
                'updated_at' => NOW(),
            ],
            [
                'user_id' => '10',
                'type' => '1',
                'parent_id' => '18',
                'title' => 'Re: As receitas do site',
                'content' => 'Nosso amigo Pedro já disse tudo! Hahaha',
                'created_at' => '2020-03-03 22:37:03',
                'updated_at' => NOW(),
            ],
            //post 6 
            [
                'user_id' => '17',
                'type' => '0',
                'parent_id' => '0',
                'title' => 'Indicação de nutricionista em São Paulo',
                'content' => 'Galerinha linda! Preciso que me indiquem um bom nutricionista vegetariano/vegano! Como faz pouco tempo
                              que eu comecei meu processo de mudança alimentar, quero um acompanhamento profissional especializado
                              no assunto!',
                'created_at' => '2020-03-04 10:07:02',
                'updated_at' => NOW(),
            ],
            //respostas post 6
            
        ]);
    }
}
