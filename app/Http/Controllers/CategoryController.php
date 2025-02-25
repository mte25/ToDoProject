<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $kategoriler = Category::get();
        //dd($kategoriler); bilgileri çekiyomu kontrol etmek için kullanılır

        return view('panel.categories.index', compact('kategoriler'));
    }

    public function createPage(){
        return view('panel.categories.create');
    }

    public function postCategory(Request $request){

        $cat = new Category();
        $cat->name = $request->category_name;
        $cat->active = $request->category_status;
        $cat->save();

        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla oluşturuldu.']);
    }

    public function updatePage($a){

        $category = Category::find($a);
        return view('panel.categories.update',compact('category'));
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->catID);
        $category->name = $request->catName;
        $category->active = $request->catStatus;
        $category->save();

        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla güncellendi.']);
    }
}
