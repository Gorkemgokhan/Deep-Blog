<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("configs")->insert([
            "title"=>"Big.Black.Blog",
            "instagram"=>"https://www.instagram.com/gorkemgokhan1/",
            "youtube"=>"https://www.youtube.com/channel/UCKcl0S6wgX7-bhUdFHmUDag",
            "github"=>"https://github.com/Gorkemgokhan",
            "created_at"=>now(),
            "updated_at"=>now(),
        ]);
    }
}
