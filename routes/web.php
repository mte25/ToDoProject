<?php

use App\Http\Controllers\CategoryController;
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

//task routları



//kategori routes
Route::get('/panel/categories/index', [CategoryController::class, 'index'])->name('panel.categoryIndex');
Route::get('/panel/categories/createPage', [CategoryController::class, 'createPage'])->name('panel.categoryCreatePage');
Route::post('/panel/categories/addCategory', [CategoryController::class, 'postCategory'])->name('panel.categoryAdd');
//kategori route
