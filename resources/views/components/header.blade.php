

<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand text-white" href="#"><i class="fa fa-graduation-cap fa-lg mr-2"></i>BLOG</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nvbCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item pl-1">
						<a class="nav-link" href="#"><i class="fa fa-home fa-fw mr-1"></i>Home</a>
					</li>
					<li class="nav-item active pl-1">
						<a class="nav-link" href="{{route('home')}}"><i class="fa fa-th-list fa-fw mr-1"></i>Blog</a>
					</li>
					<li class="nav-item pl-1">
						<a class="nav-link" href="{{route('index')}}"><i class="fa fa-info-circle fa-fw mr-1"></i>User</a>
					</li>
					<li class="nav-item pl-1">
						<a class="nav-link" href="#"><i class="fa fa-phone fa-fw fa-rotate-180 mr-1"></i>Contact</a>
					</li>
					<li class="nav-item pl-1">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New Blog
						</button>
						
					</li>
				</ul>
			</div>
		</div>

	</nav>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="form" id="ajax">
      <div class="modal-body">	
		{{ csrf_field() }}
		<div class="form-group">
        <input type="text" class="form-control blog" placeholder="Enter text" name="text" required>
		</div>
		<div class="form-group">
		<input type="text" class="form-control client_id" placeholder="Enter clientID" name="clientID" required>
      </div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="form_submit">Save</button>
	
      </div>


	  </form>
    </div>
  </div>
</div>

<script src="{{asset('js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>

	$(document).ready(function(){
	$('#ajax').on('submit',function(e){
    e.preventDefault();

		// $.ajaxSetup({
   		//  headers: {
        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	// }
		// });

		$.ajax({
			url:"{{Route('addblog')}}",
			data:$('#ajax').serialize(),
			type:"post",
			success: function(response){
				console.log(response)
				$("#exampleModal").modal('hide')
				alert("data stored");
			},
			error: function(error){
				console.log(error);
			}
		});
   });

	});
</script>