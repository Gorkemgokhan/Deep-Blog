<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Mail;

//Modellerim
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Models\Contact;
use App\Models\Config;

class Homepage extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->active==0){
            return redirect()->to("site-bakimda")->send();
        }
        view()->share("pages",Page::where("status",1)->orderBy("order","ASC")->get());
        view()->share("categories",Category::where("status",1)->inRandomOrder()->get());
    }

    public function index(){
        $data["icerikler"]=Article::with("getCategory")->where("status",1)->whereHas("getCategory",function($query){
        $query->where("status",1);
        })->orderBy("created_at","DESC")->paginate(10);
        $data["icerikler"]->withPath(url("sayfa"));
        return view("front.homepage",$data);
    }
    public function single($category,$slug){
        $category=Category::whereSlug($category,$slug)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $article->increment('hit');
        $data['article']=$article;
        return view("front.single",$data);
    }
    public function category($slug){
        $category = Category::whereSlug($slug)->first();
        $data["category"]   =   $category;
        $data["icerikler"]  =   Article::where("category_id",$category->id)->where("status",1)->orderBy("created_at","DESC")->paginate(5);
        return view("front.category",$data);
    }
    public function hakkinda(){
        return view("front.widgets.anabilgi.hakkinda");
    }
    public function iletisim(){
        return view("front.widgets.anabilgi.iletisim");
    }
    public function page($slug){
        $page=page::whereSlug($slug)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $data["page"]=$page;
        $data["pages"]=Page::orderBy("order","ASC")->get();
        return view("front.widgets.anabilgi.hakkinda",$data);
    }
    public function vizyon($slug){
        $vizyon=page::whereSlug($slug)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
        $data["page"]=$vizyon;
        $data["pages"]=Page::orderBy("order","ASC")->get();
        return view("front.widgets.anabilgi.vizyon",$data);
    }
    public function misyon($slug){
    $misyon=page::whereSlug($slug)->first()?? abort(403,"Böyle Bir Makale Yayınlanmadı");
    $data["page"]=$misyon;
    $data["pages"]=Page::orderBy("order","ASC")->get();
    return view("front.widgets.anabilgi.misyon",$data);
    }
    public function iletisimpost(Request $request){


        Mail::send([],[],function ($message) use($request){
           $message->from('iletisim@blogsitesi.com','Blog Sitesi');
           $message->to('Gorkem@blogsitesi.com');
           $message->setBody(
           'Mesaj Gönder : '.$request->name."
           Mesaj GÖnderen Mail : ".$request->email."
           Mesaj Konusu : ".$request->konu."
           Mesaj : ".$request->message."
           Mesaj Gönderilme Tarihi : ".$request->created_at."text/html");
           $message->subject($request->name.'Mesaj Gönderildi');
        });

    $contact=new Contact();
    $contact->name=$request->name;
    $contact->email=$request->email;
    $contact->konu=$request->konu;
    $contact->message=$request->message;
    $contact->save();
        return redirect()->route("iletisim")->with("success","Mesajınız Bize ulaştı. Teşekkürler.");
    }

}
