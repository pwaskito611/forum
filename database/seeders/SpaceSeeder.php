<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('spaces')->insert([
                'name' => 'dota 2',
                'description' => 'Moba 5 vs 5',
                'image_path' => 'asset/doto.png',
            ]);
        }
    }
}
