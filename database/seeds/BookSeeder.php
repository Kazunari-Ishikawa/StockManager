<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'user_id' => 3,
            'name' => 'あとで見る'
        ]);

        DB::table('books')->insert([
            'user_id' => 3,
            'name' => '読み物'
        ]);
    }
}
