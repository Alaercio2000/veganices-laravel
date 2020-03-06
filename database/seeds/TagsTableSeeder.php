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
            [
                'slug' => 'forum',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'slug' => 'vegano',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'slug' => 'apresentação',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'slug' => 'amizade',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]

        ]);
    }
}
