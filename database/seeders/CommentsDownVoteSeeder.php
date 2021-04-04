<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommentsDownVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 7; $i < 9; $i++) {
            for($j=1; $j<10; $j++) {
                DB::table('comments_down_vote')->insert([
                    'comment_id' => $j,
                    'user_id' => $i,
                ]);
            }
        }
    }
}
