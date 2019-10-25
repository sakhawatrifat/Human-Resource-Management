<div class="card">
	@if($errors->any())
	<div class="alert m-b-0 alert-danger text-center">
		<ul>
			@foreach($errors->all() as $error)
			<ul>{{$error}}</ul>
			@endforeach
		</ul>
	</div>
	@endif

	@if(session('success'))
		<div class="alert m-b-0 alert-success alert-dismissible fade show text-center" role="alert">
		  <strong>Success!</strong> {{session('success')}}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
	@if(session('error'))
		<div class="alert m-b-0 alert-danger alert-dismissible fade show text-center" role="alert">
		  <strong>Failled!</strong> {{session('error')}}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
</div>