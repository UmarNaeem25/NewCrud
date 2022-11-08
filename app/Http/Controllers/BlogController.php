<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\new_blog;


class BlogController extends Controller
{
     public function index()
    {
        
        $new_blog=new_blog::paginate(4);
        
        return view('blog.welcome')->with('new_blogs',$new_blog);
    }


    public function add(Request $request){
        $this->validate($request,[
        'text'=>'required',
        'clientID'=>'required|unique:new_blogs',
         ]);

        $new_blog=new new_blog;
        $new_blog->text=$request->text;
        $new_blog->clientID=$request->clientID;
        $new_blog->save();

        return redirect()->Route('blog.index')->with('message','Record inserted');
        
    }

    public function edit($id){

        $new_blog=new_blog::find($id);
        return view('blog.blogedit')->with('new_blog',$new_blog);
    }

    public function update(Request $request, $id){
        $new_blog=new_blog::where('id',$id)->first();
        $new_blog->text=$request->text;
        $new_blog->clientID=$request->clientID;
        $new_blog->save();
    
        return redirect()->Route('blog.index');

    }
    public function delete(Request $request){
    
        $new_blog=new_blog::find($request->id);
        // $new_blog->delete();
        if($new_blog->delete())
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

}