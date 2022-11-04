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

            Route::post('/blogadd',[BlogController::class,'add'])->name('addblog');
});