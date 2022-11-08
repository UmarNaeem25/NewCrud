@extends('layouts.app')

@section('content')
    <div class="container">
      <br>
      <br>
      <h2> Edit </h2>
      <br>
      <br>
     
        <form method="get" action="{{Route('blog.update',$new_blog->id)}}">
        @csrf
      
    <div class="form-group">
      <label>Text:</label>
      <input type="text" class="form-control" value="{{$new_blog->text}}"  name="text">
    </div>

    <div class="form-group">
      <label>Client ID:</label>
      <input type="text" class="form-control" value="{{$new_blog->clientID}}"  name="clientID">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop