@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <br>
  <h2>Data Entries</h2>    
  <br>
  <br>
  <div>

  @if(session()->has('inserted'))
  <div class="alert alert-success">
  {{session()->get('inserted')}}
  </div>
  @endif

   @if(session()->has('updated'))
  <div class="alert alert-success">
  {{session()->get('updated')}}
  </div>
  @endif
  
   @if(session()->has('deleted'))
  <div class="alert alert-success">
  {{session()->get('deleted')}}
  </div>
  @endif

</div> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        
       @foreach($forms as $form)
      <tr>
        <td>{{$form->id}}</td>
        <td>{{$form->name}}</td>
        <td>{{$form->email}}</td>
        <td>
        <a href="{{route('client.edit',$form->id)}}" class="btn btn-info">Edit</a>
        <a  onclick="return confirm('Are you sure you want to delete this entry?')" href="{{route('client.delete',$form->id)}}" class="btn btn-danger">Delete</a>  
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$forms->links()}}
  <br>
 <a href="{{route('addnew')}}"> <button class="btn btn-primary">Add New</button></a>
</div>
@stop
