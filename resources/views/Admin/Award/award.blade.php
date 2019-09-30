@extends('home')

@section('content')
@include('_partial.message')
    <div class="card">
    <div class="card-body">
    	<!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Award</button>
        <h4 class="card-title">Award Table</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Employee Name</th>
                        <th>Award Name</th>
                        <th>Gift Item</th>
                        <th>Cash Price</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($award_data as $award)
                    	<td>{{ $i++ }}</td>
                        <td>{{ $award->employee_name }}</td>
                        <td>{{ $award->award_name }}</td>
                        <td>{{ $award->gift_item }}</td>
                        <td>{{ $award->cash_price }}</td>
                        <td>{{ $award->month }}</td>
                        <td>{{ $award->year }}</td>
                        <td class="d-inline-flex">
                            <a href="{{ route('award.edit',$award->id) }}">
                            <button class="btn btn-info">Edit</button>
                            </a>
                            <form method="post" action="{{ route('award.destroy',$award->id) }}" onclick="return confirm('Are You Sure?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        @endforeach
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
          <h4 class="modal-title float-left">Award Info</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="{{ route('award.store') }}" class="form-horizontal">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Employee Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" required name="employee_name">
                                            <option value="">--Select--</option>
                                            @foreach($employee as $employee_data)
                                            <option>{{ $employee_data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Award Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="award_name" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Gift Item</label>
                                    <div class="col-md-9">
                                        <input type="text" name="gift_item" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Cash Price</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cash_price" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Month</label>
                                    <div class="col-md-9">
                                        <input type="text" name="month" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Year</label>
                                    <div class="col-md-9">
                                        <input type="text" name="year" class="form-control" placeholder="">
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
                                        <button type="button" class="btn btn-inverse" data-dismiss="modal">Cancel</button>
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