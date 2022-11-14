<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\reply;
use App\Models\new_blog;

class CommentController extends Controller
{  
    
    public function index()
    {
        
        $comment = comment::all();
        $reply = reply::all();
        
        return view('blog.welcome')->with(['comments'=>$comment,'replies'=>$reply]);
    }
    
    public function addcomment(Request $request){
        $request->validate(
            [
                'comment'=>'required'
                
            ]
        );
        
        $comment=new comment;
        $comment->comment=$request->comment;
        $comment->blog_id= $request->blog_id;
        $comment->save();
        return true;
    }

    public function addreply(Request $request){

        $reply=new reply;
        $reply->comment_id=$request->comment_id;
        $reply->blog_id=$request->blog_id;
        $reply->replies=$request->reply;
        $reply->save();
        return true;

        // $reply->column_name=$request->ajax_name;
    }

    public function deletereply(Request $request){

        $reply=reply::find($request->id);

            if($reply->delete())
        {
            $message = true;
        }else{
            $message = false;
        }

        $data =[
            'message'=>$message,
        ];
        return $data;
       
    }

    public function updatereply(Request $request){

        $reply=reply::find($request->id);
        $reply->replies=$request->myreply;
        $reply->save();
        return true;
    }
}
