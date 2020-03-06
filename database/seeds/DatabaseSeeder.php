<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(CategoryRecipesTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(States_brazilTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TagsPostsTableSeeder::class);
    }
}
