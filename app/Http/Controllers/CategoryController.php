<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){

        $kategoriler = Category::where('user_id', Auth::id())->get();
        $user = \App\Models\User::where('id', Auth::id())->first();
        //$kategoriler = Auth::user()->getCategory;
        //dd($kategoriler); bilgileri çekiyomu kontrol etmek için kullanılır

        return view('panel.categories.index', compact('kategoriler','user'));
    }

    public function createPage(){
        return view('panel.categories.create');
    }

    public function postCategory(Request $request){

        $cat = new Category();
        $cat->name = $request->category_name;
        $cat->active = $request->category_status;

        $cat->user_id = Auth::id();
        $cat->save();

        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla oluşturuldu.']);
    }

    public function updatePage($a){

        $category = Category::find($a);
        return view('panel.categories.update',compact('category'));
    }

    public function updateCategory(Request $request){
        //dd($request->all());  //catName, catStatus, catID

        $request->validate([
            'catStatus' =>'min:0|max:1|',
            'catName' =>'min:3|max:8|required',
        ],[
            'catName.min'=>'Kategori adı daha uzun olmalıdır',
            'catName.max'=>'Kategori adı daha kısa olmalıdır',
            'catName.required'=>'Kategori adı zorunludur!',
        ]);



        $category = Category::find($request->catID);
        if ($category !=null){
            $category->name = $request->catName;
            $category->active = $request->catStatus;
            $category->save();

            return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla güncellendi.']);
        }
        else{
            return redirect()->route('panel.categoryIndex')->with(['error'=>'Bir hata oluştu.']);
        }

    }

    public function updateCategoryTest($id, Request $request){
        $category = Category::find($id);
    }

    public function categoryDelete($id){
        $category = Category::find($id);

        if($category->deleted_at == null){
            $category->delete();
            return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla silindi]']);
        }
        else{
            return redirect()->route('panel.categoryIndex')->with(['error'=>'Hata oluştu.]']);
        }
    }
}
