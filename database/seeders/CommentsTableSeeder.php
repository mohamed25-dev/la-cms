<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body' => "شكرًا جزيلًا",
            'post_id' => "1",
            'user_id' => "2",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'body' => "مقال مفيد",
            'post_id' => "1",
            'user_id' => "1",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'body' => "مقال ممتاز شكرا لك",
            'post_id' => "2",
            'user_id' => "2",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'body' => "أختلف معك في بعض النقاط .. لكن في المجمل المقال رائع ",
            'post_id' => "4",
            'user_id' => "1",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'body' => "مقال لا بأس كبداية أتمنى لك التوفيق",
            'post_id' => "3",
            'user_id' => "2",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
