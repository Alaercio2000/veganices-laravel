<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            //1
            [
                'slug' => 'forum',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //2
            [
                'slug' => 'vegano',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //3
            [
                'slug' => 'veganismo',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //4
            [
                'slug' => 'apresentação',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //5
            [
                'slug' => 'alimentação',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //6
            [
                'slug' => 'receitas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //7
            [
                'slug' => 'ajuda',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //8
            [
                'slug' => 'dicas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //9
            [
                'slug' => 'saúde',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //10
            [
                'slug' => 'dúvidas',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            //11
            [
                'slug' => 'curiosidade',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],

        ]);
    }
}
