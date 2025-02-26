<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function createPage(){
        $categories = Category::where('user_id',Auth::user()->id)->get();
        return view('panel.tasks.create',compact('categories'));
    }
    public function addTask(Request $request){
        //dump and die
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'deadline' => 'required'

        ]);
        //dd($request->all());

        $task = new Task();
        $task->category_id = $request->category;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();

        return redirect()->route('panel.indexTask')->with(['success','Görev Başarıyla Eklendi']);
    }

    public function indexPage(){
        $user = Auth::user();
        $tasks = $user->getTasks;


        return view('panel.tasks.index',compact('tasks'));
    }
}
