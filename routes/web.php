<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\BlogController;

            

            Route::group(['prefix'=>'client'],function(){

            Route::get('/home',[FormsController::class,'welcome'])->name('home');

            Route::get('/',[FormsController::class,'index'])->name('index');

            Route::get('/addnew',[FormsController::class,'create'])->name('addnew');

            Route::post('/store',[FormsController::class,'store'])->name('client.store');

            Route::get('/edit/{id}',[FormsController::class,'edit'])->name('client.edit');

            Route::post('/update/{id}',[FormsController::class,'update'])->name('client.update');

            Route::get('/delete/{id}',[FormsController::class,'delete'])->name('client.delete');

            // Route::post('/blogadd',[BlogController::class,'add'])->name('addblog');

            Route::get('/blogindex',[BlogController::class,'index'])->name('blog.index');

             //Route::post('/blogcreate',[BlogController::class,'create'])->name('blog.create');

            Route::post('/blogadd',[BlogController::class,'add'])->name('addblog');

            Route::get('/blogedit/{id}',[BlogController::class,'edit'])->name('blog.edit');

            Route::get('/blogupdate/{id}',[BlogController::class,'update'])->name('blog.update');

            // Route::get('/blogdelete/{id}',[BlogController::class,'delete'])->name('blog.delete');

            Route::post('/blogdelete',[BlogController::class,'delete'])->name('blogdelete');

    
}); 
