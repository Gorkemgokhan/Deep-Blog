<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy("created_at","ASC")->get();
        return view("back\articiles\index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('back\articiles\create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $article=new Article;
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->content;
        $article->slug=Str::slug($request->title);
        if ($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Başarılı!', 'Makale Eklendi');
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();
        return view('back\articiles\update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->content;
        $article->slug=Str::slug($request->title);
        if ($request->hasFile('image')){
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }
        $article->save();
        toastr()->success('Başarılı!', 'Makale Düzenlendi');
        return redirect()->route('admin.makaleler.index');
    }

    public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ?  1 : 0 ;
        $article->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    Article::find($id)->delete();
    toastr()->success('Başarılı!', 'Makale Geri Dönüşüm Kutusunu gönderildi');
        return redirect()->route('admin.makaleler.index');
    }
    public function trashed(){
    $articles=Article::onlyTrashed()->orderBy("deleted_at","desc")->get();
    return view("back.articiles.trashed",compact("articles"));
    }
    public function recover($id){
    Article::onlyTrashed()->find($id)->restore();
        toastr()->success("", 'Makale Başarı ile Geri kurtarıldı');
        return redirect()->back();
    }
    public function HardDelete($id){
        $page=Page::find($id);
        if (File::exists($page->image)){
            File::delete(public_path($page->image));
        }
        $page->delete();
        toastr()->success('Başarılı!', 'Makale Silindi');
        return redirect()->route('admin.makaleler.index');
    }
}
