<?php

use Illuminate\Database\Seeder;

class TagsPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags_community_posts')->insert([
            [
                'tags_id' => '1',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '2',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '7',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '8',
                'community_post_id' => '1',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '1',
                'community_post_id' => '5',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '4',
                'community_post_id' => '5',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '7',
                'community_post_id' => '13',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '8',
                'community_post_id' => '13',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '10',
                'community_post_id' => '13',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '11',
                'community_post_id' => '15',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '6',
                'community_post_id' => '18',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '7',
                'community_post_id' => '18',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
            [
                'tags_id' => '10',
                'community_post_id' => '18',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
