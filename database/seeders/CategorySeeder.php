<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Genel","Eğlence", "Bilişim", "Eğitim", "Yemek", "Haber", "Gezi", "Teknoloji", "Spor", "Günlük Yaşam"];
        foreach ($categories as $categories) {
            DB::table("categories")->insert([
                "name" => $categories,
                "slug"=>$categories,
                "created_at"=>now(),
                "updated_at"=>now()
            ]);
        }
    }
}
