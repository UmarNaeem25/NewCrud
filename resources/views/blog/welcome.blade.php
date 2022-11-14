

@extends('layouts.app')

@section('content')


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
    
    {{-- <a class="btn btn-warning" href="{{Route('blog.edit' ,$myblog->id)}}">Edit</a>
    <a class="btn btn-danger" onclick="delete_function({{$myblog->id}})">Delete</a> --}}
    {{-- onclick="return confirm('Do you really want to delete this blog?')" --}}

  <div class="container">
  <div class="dialogbox">
    <div class="body">
      <span class="tip tip-down"></span>
      <form>
      @csrf
      <div class="message">
        Comments here
        <br>
        <textarea name="comment" id="comment_{{$myblog->id}}"></textarea>
      </div>
    </div>
     <button onclick="store({{$myblog->id}},$('#comment_{{$myblog->id}}').val())" class="btn btn-primary">Post Comment</button>
     </div>
  </div>
  </form>
  <h5 align="right">Comments</h5>

  @php

       $co = App\Models\Comment::where('blog_id',$myblog->id)->get()

      @endphp

  <div style="overflow-y: auto, height:200px;"> 
  @foreach($co as $data)
 
  <div class="container" align="right">
  <div class="dialogbox">
    <div class="body">
      
      <div class="message">

    {{$data->comment}}


      </div>

    </div>
     </div>

     <div id="hide_{{$data->id}}" style="display: none">

     <textarea name="reply" id="reply_{{$data->id}}"> </textarea>

     </div> 
    

     

     @php

     $reply = App\Models\reply::where('comment_id',$data->id)->get()

     @endphp

     
     <button onclick="toggler({{$data->id}})">Add Reply</button> 
     <button onclick="replied({{$data->blog_id}},{{$data->id}},$('#reply_{{$data->id}}').val())">Post Reply</button>
     <button data-toggle="modal" data-target="#showmodal{{$data->id}}">View replies</button>

            <div class="modal fade" id="showmodal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Replies</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style=" text-align: justify; ">
              @foreach($reply as $answer) 
          
               <p id="change_{{$answer->id}}"> {{$answer->replies}}</p>
             
              <a class="btn btn-warning" onclick="edit_function({{$answer->id}})">Edit</a>
          
              <a class="btn btn-danger" onclick="delete_function({{$answer->id}})">Delete</a>
              <br>
              <br>

              <div id="edit_{{$answer->id}}" style="display: none">
               <input type="text" id="update_{{$answer->id}}" value="{{$answer->replies}}" style="width: 100%">
               <br>
               <br>
               <button onclick="update_function({{$answer->id}},$('#update_{{$answer->id}}').val())">Update</button>
              </div>
              <br>
            @endforeach
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



  </div>
  @endforeach 
    </div> 
</div>
</div>
</div>
@endforeach

{{$new_blogs->links()}}




<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.1.js" integrity="sha256-lGuUqJUPXJEMgQX/RRaM6mZkK6ono5i5bHuBME4qOCo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
 var url_route = "{{route('reply.delete')}}";

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
                console.log('data');
              alert('record deleted');  

              }
           });
    
            };



var comment_route="{{route('comment.add')}}";
function store(blog_id,comment)
{
  
    var blog  = blog_id;
    var mycomment = comment;
    console.log(mycomment);
    if(mycomment == ' ')
    {
      alert('please enter something');
      return false;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
    $.ajax({
              url: comment_route,
              type: 'POST',
              dataType: 'json',
              data: {
              "blog_id": blog,
              "comment":mycomment
             },
              success: function(response) {
                console.log('added');
                alert('comment added');  
                $('#comment_'+blog).val('');

              }
           });
          
};

function toggler(id){

  var division=document.getElementById('hide_'+id);

  if(division.style.display=="none"){
    division.style.display="block";
  }
  else{
    division.style.display="none";
  }

};

function edit_function(id){

var editbox= document.getElementById('edit_'+id);
if(editbox.style.display=="none"){

  editbox.style.display="block";
}
else{
  editbox.style.display="none";
}
};

var update_route="{{route('reply.update')}}";

function update_function(id, reply_update){

  // var myinput=document.getElementById('update_'+id);
  // var change_reply=document.getElementById('change_'+id);
  // change_reply.innerHTML=myinput.value;

  var update_id=id;
  var change_reply=reply_update;
  console.log(change_reply);

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  $.ajax({
              url: update_route,
              type: 'POST',
              dataType: 'json',
              data: {
              
              "id":update_id,
              "myreply":change_reply
             },
              success: function(response) {
                console.log('updated');
                alert('reply updated');  
              }
           });
};



var reply_route="{{route('reply.add')}}";

function replied(blog_id,comment_id,reply){

var blogs=blog_id;
var comment=comment_id;
var answer=reply;

console.log(blogs,comment,answer);

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
    $.ajax({
              url: reply_route,
              type: 'POST',
              dataType: 'json',
              data: {
              "blog_id":blogs,
              "comment_id": comment,
              "reply": answer
             },
              success: function(response) {
                console.log('added');
                alert('reply added');  
              }
           });

}

</script>
@stop
