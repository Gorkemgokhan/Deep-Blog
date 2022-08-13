<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class  PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ["Ana sayfa","İletişim","Hakkımızda","Vizyonumuz","Misyonumuz"];
        $count=0;
        foreach ($pages as $page) {
            $count++;

            DB::table("pages")->insert([
                "title" => $page,
                "slug" => Str::slug($page),
                "image" => "https://cdn.pixabay.com/photo/2022/08/05/19/21/squirrel-7367445_960_720.jpg",
                "content" => "I want the random text from Lorem Ipsum so I can use it when generating webpages.
                                I can't find any PHP functions that does this and I'm wondering if there's any publicly available libraries
                                or APIs on sites that could be used to get some random text?",
                "order" => $count,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
