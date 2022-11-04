<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;
use Validator;

class FormController extends Controller
{
    public function index(){

        $form=Form::all();
        return view('blog.blog')->with('forms',$form);
    }


    public function create(Request $request){
         $this->validate($request,[
        'name'=>'required',
        'email'=>'required|unique:forms',
        'password'=>'required',
         ]);

        $form=new Form;
        $form->name=$request->name;
        $form->email=$request->email;
        $form->password=$request->password;
        $form->save();
        return redirect('/');
    }

    public function edit($id){
        $form= new Form;
        $form=Form::where('id',$id)->first();
        return view('blog.edit', ['forms'->$form]);

    }
    public function update(Request $request ,$id){
        $form=Form::where('id',$id)->first();
        $form->name=$request->name;
        $form->save();
        return redirect('/');

    }
    public function delete(){
        $form=new Form;
        $form->delete();
        return redirect('/');
    }
}

