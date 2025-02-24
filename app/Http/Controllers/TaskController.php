<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createPage(){
        return view('panel.tasks.create');
    }
    public function addTask(Request $request){
        //dump and die
        //dd($request->all());
        $request->validate([
            'title' => 'required|max:15|min:3',
            'content' => 'required|string',
            'status' => 'required|in:pending,completed',
            'deadline' => 'required|date'
        ]);

        $task = new Task();
        $task->category_id = 1;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();

        return 'başarılı';
    }
}
