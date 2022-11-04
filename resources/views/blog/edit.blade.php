@extends('layouts.app')

@section('content')
    <div class="container">
      <br>
      <br>
      <h2> Edit </h2>
      <br>
      <br>
     
        <form method="post" action="{{route('client.update',$form->id)}}">
        @csrf
      
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" value="{{$form->name}}"  name="name">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" value="{{$form->email}}"  name="email">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="text" class="form-control" value="{{$form->password}}"  name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop