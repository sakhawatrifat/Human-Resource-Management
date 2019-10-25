<option value="">--Select--</option>
	@foreach($designation as $designation)
		<option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
	@endforeach