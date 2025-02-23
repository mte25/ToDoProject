<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//test routing

Route::get('testRoute',function (){
   return view('panel.layout.app');
});
Route::get('testRoutes',function (){
    return view('panel.layout.app');
});



//task routları
Route::get('/panel/tasks/create',[TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('/panel/tasks/add',[TaskController::class,'addTask'])->name('panel.addTask');
