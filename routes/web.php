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
Route::get('/panel/tasks/index',[TaskController::class,'indexPage'])->name('panel.indexTask');

//task routları



//kategori routes
Route::get('/panel/categories/index', [CategoryController::class, 'index'])->name('panel.categoryIndex');
Route::get('/panel/categories/createPage', [CategoryController::class, 'createPage'])->name('panel.categoryCreatePage');
Route::post('/panel/categories/addCategory', [CategoryController::class, 'postCategory'])->name('panel.categoryAdd');
Route::get('/panel/categories/update/{id}', [CategoryController::class, 'updatePage'])->name('panel.categoryUpdatePage');
Route::post('/panel/category/updatePost', [CategoryController::class, 'updateCategory'])->name('panel.updateCategory');
//parametreli form post
Route::post('/panel/category/updatePostTest/{id}', [CategoryController::class, 'updateCategoryTest'])->name('panel.updateCategoryTest');
Route::get('/panel/categories/deleteCategory/{id}', [CategoryController::class, 'categoryDelete'])->name('panel.categoryDelete');
//kategori routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
