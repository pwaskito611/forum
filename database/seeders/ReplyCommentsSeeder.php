<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReplyCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            for($j= 1; $j < 10; $j++) {
             DB::table('reply_comments')->insert([
                 'comment_id' => $i,
                 'user_id' => $j,
                 'comment' => Str::random(20),
                 
             ]);
            }
         }
    }
}
