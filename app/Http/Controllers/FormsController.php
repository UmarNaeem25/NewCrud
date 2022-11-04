<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Validator;

class FormsController extends Controller
{
    public function welcome(){

        return view('blog.welcome');
    }

    public function index()
    {
        $form=Form::all();
        return view('blog.blog')->with('forms',$form);
    }


    public function create()
    {
        return view('blog.new');
    }
    public function store(Request $request){

        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|unique:forms',
        'password'=>'required',
         ]);

        $form=new Form;
        $form->name=$request->name;
        $form->email=$request->email;
        $form->password=$request->password;
        $form->updated_at= now();
        $form->save();
        return redirect('/client');

    }

    public function edit($id){

        $form=Form::find($id);
        return view('blog.edit')->with('form',$form);
       

    }
    public function update(Request $request ,$id){
        $form=Form::where('id',$id)->first();
        $form->name=$request->name;
        $form->email=$request->email;
        $form->password=$request->password;
        $form->save();
        return redirect('client');

    }
    public function delete($id){
        $form=Form::find($id);
        $form->delete();
        return redirect('client');
    }
}
