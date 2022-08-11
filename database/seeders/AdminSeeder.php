<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admins")->insert([
            "name" => "Görkem GÖkhan",
            "email" => "gorkem12_gokhan12@hotmail.com",
            "password" =>bcrypt( "123456",)
        ]);
    }
}
