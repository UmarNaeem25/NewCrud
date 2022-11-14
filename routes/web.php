<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;     
use App\Http\Controllers\CommentController;       

            Route::group(['prefix'=>'client'],function(){

            Route::get('/home',[FormsController::class,'welcome'])->name('home');

            Route::get('/',[FormsController::class,'index'])->name('index');

            Route::get('/addnew',[FormsController::class,'create'])->name('addnew');

            Route::post('/store',[FormsController::class,'store'])->name('client.store');

            Route::get('/edit/{id}',[FormsController::class,'edit'])->name('client.edit');

            Route::post('/update/{id}',[FormsController::class,'update'])->name('client.update');

            Route::get('/delete/{id}',[FormsController::class,'delete'])->name('client.delete');


            Route::get('/blogindex',[BlogController::class,'index'])->name('blog.index');


            Route::post('/blogadd',[BlogController::class,'add'])->name('addblog');

            Route::get('/blogedit/{id}',[BlogController::class,'edit'])->name('blog.edit');

            Route::get('/blogupdate/{id}',[BlogController::class,'update'])->name('blog.update');

            Route::post('/blogdelete',[BlogController::class,'delete'])->name('blogdelete');

            Route::get('/register',[RegisterController::class,'index'])->name('register.index');

            Route::post('/comment',[CommentController::class,'addcomment'])->name('comment.add');

            Route::post('/reply',[CommentController::class,'addreply'])->name('reply.add');

            Route::post('/replyupdate',[CommentController::class,'updatereply'])->name('reply.update');

            Route::post('/replydelete',[CommentController::class,'deletereply'])->name('reply.delete');


            Route::post('/registerform',[RegisterController::class,'index'])->name('register.view');

            Route::post('/login',[LoginController::class,'index'])->name('login.view');
}); 
