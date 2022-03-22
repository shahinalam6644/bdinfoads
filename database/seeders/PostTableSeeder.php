<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'new future',
            'content' => 'this is content',
            'thumbnail_path' => 1,
            'status' => 1,
        ]);
    }
}
