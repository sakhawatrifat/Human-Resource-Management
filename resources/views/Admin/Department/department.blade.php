@extends('home')

@section('content')

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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                    </tr>
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
                                    <div class="col-md-9">
                                    	<input type="text" name="designation_name[]" class="form-control designation_name" placeholder="">
                                    	 
                                        <a href="#" class="btn btn-danger remove"><i class="fas fa-times"></i></a>
                                         
                                    </div>
                                    <button type="button" class="btn btn-dark btn-sm btn float-right addRaw">+ Add Designation</button>
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
		$('.addRaw').on(click,funtion(){
			.addRaw();
		});
		function addRaw()
		{
			let $field = '<input type="text" name="designation_name[]" class="form-control designation_name" placeholder="Type Here">';
			$('tbody').append($field);
		};
	})
</script>
@endsection