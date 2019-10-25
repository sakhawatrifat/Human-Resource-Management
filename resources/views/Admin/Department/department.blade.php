@extends('home')

@section('content')
@include('_partial.message')

<div class="card">
    <div class="card-body">
    	<!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Department</button>

        <h4 class="card-title">Department List</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($department as $dept_data)
                        @php  @endphp
                        <td>{{ $i++ }}</td>
                        <td>{{ $dept_data->department_name }}</td>
                        <td>
                            @php $desig_data = App\Designation::where('department_id',$dept_data->id)->get();
                            @endphp
                            @foreach($desig_data as $designation)
                            <li>{{ $designation->designation_name }}</li>
                            @endforeach
                        </td>
                        
                        <td class="d-inline-flex"> 
                            <a href="{{ route('department.edit',$dept_data->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <form method="post" action="{{ route('department.destroy',$dept_data->id) }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title float-left">Department Info</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="" class="form-horizontal">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Department</label>
                                    <div class="col-md-9">
                                        <input type="text" name="department_name" class="form-control" placeholder="">
                                    </div>
                                </div>
								<hr>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Designation</label>
                                    <div class="col-md-9 body p-0">
                                        <div class="d-inline-flex col-md-12">
                                            <input type="text" name="designation_name[]" class="form-control col-md-11">
                                            <a href="#" class="btn btn-dark addRaw"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.addRaw').on('click',function(){
            event.preventDefault();
                 $field = '<div class="d-inline-flex col-md-12 m-t-5 removeDesignation"><input type="text" name="designation_name[]" class="form-control col-md-11 designation_name">\
                <a href="#" class="btn btn-danger remove"><i class="fas fa-times"></i></a></div>';
            $('div .body').append($field);
		});
        $('.body').on('click','.remove',function(){
            event.preventDefault();
            $(this).closest('div').remove();
        });
	});
</script>
@endsection