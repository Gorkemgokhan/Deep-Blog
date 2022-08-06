<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
//Modellerim
use App\Models\Article;
use App\Models\Category;


class Homepage extends Controller
{
    public function index(){
        $data["icerikler"]=Article::orderBy("created_at","DESC")->get();
        $data["categories"]=Category::inRandomOrder()->get();
        return view("front.homepage",$data);
    }
    public function single($category,$slug){
        $category=Category::whereSlug($category,$slug)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $article->increment('hit');
        $data['article']=$article;
        $data["categories"]=Category::inRandomOrder()->get();
        return view("front.single",$data);
    }
    public function category($slug){
        $category = Category::whereSlug($slug)->first();

        $categories = Category::get();

        $data["category"]   =   $category;
        $data["icerikler"]  =   Article::where("category_id",$category->id)->orderBy("created_at","DESC")->get();
        $data["categories"] =   $categories;

        return view("front.category",$data);
    }
    public function hakkinda(){
        return view("front.widgets.anabilgi.hakkinda");
    }
    public function iletisim(){
        return view("front.widgets.anabilgi.iletisim");
    }
}
