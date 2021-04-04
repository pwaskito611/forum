<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReplyCommentsUpVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 7; $i++) {
            for($j=1; $j<10; $j++) {
                DB::table('comments_up_vote')->insert([
                    'reply_comment_id' => $j,
                    'user_id' => $i,
                ]);
            }
        }
    }
}
