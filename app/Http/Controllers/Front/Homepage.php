<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Validator;
//Modellerim
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Models\Contact;
use Mail;

class Homepage extends Controller
{
    public function __construct()
    {
        view()->share("pages",Page::orderBy("order","ASC")->get());
    }

    public function index(){
        $data["icerikler"]=Article::orderBy("created_at","DESC")->paginate(5);
        $data["icerikler"]->withPath(url("sayfa"));
        $data["categories"]=Category::inRandomOrder()->get();
        $data["pages"]=Page::orderBy("order","ASC")->get();
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
        $data["icerikler"]  =   Article::where("category_id",$category->id)->orderBy("created_at","DESC")->paginate(5);
        $data["categories"] =   $categories;

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

        $rules=[
          'name'=>'required|min:5',
          'email'=>'required|email',
          'konu'=>"required",
          'message'=>'required|min:20'
        ];
        $validate=Validator::make($request->post(),$rules);
            if($validate->fails()){
             return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        Mail::send([],[],function ($message) use($request){
           $message->from('iletisim@blogsitesi.com','Blog Sitesi');
           $message->to('Gorkem@blogsitesi.com');
           $message->setBody('Mesaj Gönder : '.$request->name."<br>
                   Mesaj GÖnderen Mail : ".$request->email."<br>
                   Mesaj Konusu : ".$request->konu."<br>
                   Mesaj : ".$request->message."<br>
                   Mesaj Gönderilme Tarihi : ".$request->created_at."text/html");
           $message->subject($request->name.'Mesaj Gönderildi');
        });

   // $contact=new Contact();
   // $contact->name=$request->name;
   // $contact->email=$request->email;
   // $contact->konu=$request->konu;
   // $contact->message=$request->message;
   // $contact->save();
    return redirect()->route("iletisim")->with("success","Mesajınız Bize ulaştı. Teşekkürler.");
    }

}
