<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\new_blog;


class BlogController extends Controller
{
    
    public function add(Request $request){
        $new_blog=new new_blog;
        
        $new_blog->text=$request->text;
        $new_blog->clientID=$request->clientID;
        $new_blog->save();
        
    }

}