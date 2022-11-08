

@extends('layouts.app')

@section('content')

<div>
  @if(session()->has('message'))
  <div class="alert alert-success">
  {{session()->get('message')}}
  </div>
  @endif
</div>
@foreach($new_blogs as $myblog)
<input type="hidden" class="blog_id" name="blog_id" value="{{$myblog->id}}">
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Blog {{$loop->index+1}}</h1>     
    <br>
    <span>{{$myblog->text}}</span>
    <span>{{$myblog->clientID}}</span>
    <br>
    <br>
  
    <a class="btn btn-warning" href="{{Route('blog.edit' ,$myblog->id)}}">Edit</a>
    <a class="btn btn-danger" onclick="delete_function({{$myblog->id}})">Delete</a>
    {{-- onclick="return confirm('Do you really want to delete this blog?')" --}}
  </div>
</div>
  {{-- <!--Modal -->
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p>Are you sure you want to delete this entry?</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <a href="{{Route('blog.delete' ,$myblog->id)}}" class="btn btn-primary">Yes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div> --}}
@endforeach
{{$new_blogs->links()}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.1.js" integrity="sha256-lGuUqJUPXJEMgQX/RRaM6mZkK6ono5i5bHuBME4qOCo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
 var url_route = "{{route('blogdelete')}}";

 function delete_function(id){

  var blog_id  = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
    $.ajax({
              url: url_route,
              type: 'POST',
              dataType: 'json',
              data: {
              "id": blog_id
             },
              success: function(response) {
                console.log(response);
              alert('record deleted');  
              }
           });
    
            }

</script>  
@stop
