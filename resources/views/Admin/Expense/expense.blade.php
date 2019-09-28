@extends('home')

@section('content')

<div class="card">
    <div class="card-body">
    	<!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Expense</button>

        <h4 class="card-title">Expense List</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Item Name</th>
                        <th>Purchase From</th>
                        <th>Purchase Date</th>
                        <th>Amount Price</th>
                        <th>Attach Bill</th>
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
          <h4 class="modal-title float-left">Expense Form</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="" class="form-horizontal">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Item Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Purchase From</label>
                                    <div class="col-md-9">
                                    	<input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Purchase Date</label>
                                    <div class="col-md-9">
                                    	<input type="date" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Ammount Price</label>
                                    <div class="col-md-9">
                                    	<input type="text" name="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Attach Bill</label>
                                    <div class="col-md-9">
                                    	<input type="file" name="" class="form-control" placeholder="">
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