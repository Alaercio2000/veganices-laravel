<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                'cnpj' => '74859943039832',
                'user_id' => 5,
                'name' => 'Empório mais verde',
                'avatar' => '49242568.jpg',
                'date_opening' => '2000-12-23',
                'phone' => '11 5071-4355',
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ],
        ]);
    }
}
