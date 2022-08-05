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
            DB::table("icerikler")->insert([
               "category_id"=>rand(1,7),
                "title"=>Str::slug("Deneme Başlık42"),
                "image"=>asset("https://www.google.com/search?q=front/assets/Logo.icon&client=opera&hs=4xE&sxsrf=ALiCzsYoTik3kGJoP9HCq5KLjcEr-D_Y9A:1659520069535&source=lnms&tbm=isch&sa=X&ved=2ahUKEwiaxveBsqr5AhUNVfEDHQVfA_sQ_AUoAXoECAEQAw&biw=1880&bih=939&dpr=1#imgrc=mL_2nR_fuSzJ0M"),
                "content"=>Str::slug("Deneme Metin yazıları asdfasfasşşliasfasldslkdlsaldlsaldasşldlasldilasidliasl"),
                "slug"=>Str::slug("Deneme Başlık"),
                "created_at"=>now(),
                "updated_at"=>now()
            ]);
    }
}
