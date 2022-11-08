
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
					<li class="nav-item pl-1 active">
						<a class="nav-link" href="{{route('blog.index')}}"><i class="fa fa-th-list fa-fw mr-1"></i>Blog</a>
					</li>
					<li class="nav-item pl-1 active">
						<a class="nav-link active" href="{{route('index')}}"><i class="fa fa-info-circle fa-fw mr-1"></i>User</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="form" id="ajax">
      <div class="modal-body">	
		{{ csrf_field() }}
		<div class="form-group">
        <input type="text" class="form-control blog" placeholder="Enter text" name="text" autocomplete="off" required>
		</div>
		<div class="form-group">
		<input type="text" class="form-control client_id" placeholder="Enter clientID" name="clientID" autocomplete="off" required>
	  
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


<script>

	$(document).ready(function(){
	$('#ajax').on('submit',function(){

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