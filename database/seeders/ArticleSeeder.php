<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* for($i=0;$i<10;$i++) {
            DB::table("icerikler")->insert([
                "category_id" => random_int(1,9),
                "title" => Str::slug("Deneme Başlık42"),
                "image" => asset("https://cdn.pixabay.com/photo/2022/08/05/19/21/squirrel-7367445_960_720.jpg"),
                "content" => Str::slug("Deneme Metin yazıları asdfasfasşşliasfasldslkdlsaldlsaldasşldlasldilasidliasl"),
                "slug" => Str::slug("Deneme Başlık"),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }*/
    }
}
