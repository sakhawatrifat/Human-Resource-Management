@extends('home')

@section('content')

<div class="card">
    <div class="card-body">
    	<!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Notice</button>

        <h4 class="card-title">Notice List</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Notice Date</th>
                        <th>Attachment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
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
          <h4 class="modal-title float-left">Notice Form</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="" class="form-horizontal">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Description</label>
                                    <div class="col-md-9">
                                    	<textarea rows="3" name="" class="form-control" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Notice Date</label>
                                    <div class="col-md-9">
                                    	<input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Attachment</label>
                                    <div class="col-md-9">
                                    	<input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select">
                                        	<option value="">--Select--</option>
                                            <option value="">Active</option>
                                            <option value="">Inactive</option>
                                        </select>
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

@endsection