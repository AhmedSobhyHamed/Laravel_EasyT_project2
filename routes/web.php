<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\userControl;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','welcome',['title'=>'welcome to my blog'])->name('welcome');


Route::middleware(['userAllowed'])->group(function(){
    Route::get   ('all',              [blogController::class,'index'])    ->name('postAll'); // only user
    Route::get   ('post/{id}/preview',[blogController::class,'show'])     ->name('postView')->where('id','[0-9]+');//only user
    Route::get   ('post/create',      [blogController::class,'create'])   ->name('postCreate');//only user
    Route::post  ('post/store',       [blogController::class,'store'])    ->name('postStore');//only user
    Route::delete('posts/delete',     [blogController::class,'deleteAll'])->name('postsDelete');// only user

    Route::get('logout',[userControl::class , 'logout'])->name('logout'); // only user
});
Route::middleware('userNotAllowed')->group(function(){
    Route::get('login',[userControl::class , 'login'])->name('login'); //not a user
    Route::get('signup',[userControl::class , 'signup'])->name('signup'); // not a user
    Route::post('auth',[userControl::class , 'auth'])->name('auth'); // not a user
    Route::post('reg',[userControl::class , 'register'])->name('reg'); // not a user
});
Route::middleware('onlyOneUserAllowed')->group(function(){
    Route::get   ('post/{id}/edit',  [blogController::class,'edit'])   ->name('postEdit')->where('id','[0-9]+');//only creator
    Route::put   ('post/{id}/update',[blogController::class,'update']) ->name('postUpdate')->where('id','[0-9]+');// only creator
    Route::delete('post/{id}/delete',[blogController::class,'destroy'])->name('postDelete')->where('id','[0-9]+');// only creator
});