<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }

    public function create(Request $request){
        $isExist=Category::whereSlug(Str::slug($request->category))->first();
        if ($isExist){
            toastr()->error($request->category." Adında bir kategori mevcut!","Hata");
            return redirect()->back();
        }
        $category= new Category;
        $category->name=$request->category;
        $category->slug=Str::slug($request->category);
        $category->save();
        toastr()->success('Başarılı!', 'Kategory Oluşturuldu');
        return redirect()->back();
    }
    public function update(Request $request){

        $isSlug=Category::whereSlug(Str::slug($request->slug))->whereNotIn("id",[$request->id])->first();
        $isName=Category::whereName($request->category)->whereNotIn("id",[$request->id])->first();
        if ($isSlug or $isName){
            toastr()->error($request->category." Adında bir kategori mevcut!","Hata");
            return redirect()->back();
        }
        $category= Category::find($request->id);
        $category->name=$request->category;
        $category->slug=Str::slug($request->slug);
        $category->save();
        toastr()->success('Başarılı!', 'Güncellendi');
        return redirect()->back();
    }
    public function delete(Request $request){
        $category=Category::findOrFail($request->id);
        if ($category->id==1){
            toastr()->error('Başarısız!', 'Genel Makalesi Silinemez!');
            return redirect()->back();
        }

        $count=$category->articleCount();
        if ($count>0){
            Article::where("category_id",$category->id)->update(["category_id"=>1]);
            $defaultCategory=Category::find(1);
            toastr()->success('Başarılı!', "Bu Kategorideki ".$count." makale ".$defaultCategory->name." Kategorysine aktarıldı!");
            $category->delete();
            return redirect()->back();
        }
        $category->delete();
        toastr()->success("Başarılı!","Kategory Başarıyla silindi");
        return redirect()->back();
    }


    public function getData(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function switch(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->statu == "true" ? 1 : 0;
        $category->save();
    }

}
