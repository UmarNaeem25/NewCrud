@extends('layouts.app')

@section('content')
    <div class="container">
      <br>
      <br>
    <h2>New Record</h2>
    <form method="POST" action="{{route('client.store')}}" class='form'>
        @csrf

    <div class="form-group">
      <br>
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
      @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="text" class="form-control" placeholder="Enter password" name="password" id="pass">
    </div>
    <div class="form-group">
      <label>Confirm Password</label>
      <input type="text" class="form-control" placeholder="Enter confirm password" name="con-password" id="conpass">
      <span id="msg" class="text-danger"></span>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>

</div>
<script>
    $('.form').submit(function(e){
      var pwd=$('#pass').val();
      var cpwd=$('#conpass').val();
      if(pwd!=cpwd){
        $('#msg').html('Passwords do not match');
      
        return false;
      }
    } 
    );
</script>
@stop
