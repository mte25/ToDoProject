<?php

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
