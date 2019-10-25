@extends('home')

@section('content')
@include('_partial.message')

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
                        <th>Ammount Price</th>
                        <th>Attach Bill</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($expense as $expense_data)
                        <td>{{ $i++ }}</td>
                        <td>{{ $expense_data->item_name }}</td>
                        <td>{{ $expense_data->purchase_from }}</td>
                        <td>{{ $expense_data->purchase_date }}</td>
                        <td>{{ $expense_data->ammount_price }}</td>
                        <td>
                            <a href="{{ asset('file/'.$expense_data->attach_bill) }}" download>
                                @if(!($expense_data->attach_bill))
                                <span class="text-danger">No File</span>
                                @else
                                <button class="btn btn-success">Download Bill</button>
                                @endif
                            </a>
                        </td>
                        <td class="d-inline-flex">
                            <a href="{{ route('expense.edit',$expense_data->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <form method="post" action="{{ route('expense.destroy',$expense_data->id) }}">
                            @method('delete')
                            @csrf
                                <button class="btn btn-danger">Delete</button>
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
          <h4 class="modal-title float-left">Expense Form</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Item Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Purchase From</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" required name="purchase_from">
                                            <option value="">--Select--</option>
                                            @foreach($employee as $employee_data)
                                            <option value="{{ $employee_data->employee_id }}">{{ $employee_data->employee_name }}</option>
                                            @endforeach
                                        </select>
                                    	{{-- <input type="text" name="purchase_from" class="form-control" value="{{ old('purchase_from') }}"> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Purchase Date</label>
                                    <div class="col-md-9">
                                    	<input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Ammount Price</label>
                                    <div class="col-md-9">
                                    	<input type="text" name="ammount_price" class="form-control" value="{{ old('ammount_price') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Attach Bill</label>
                                    <div class="col-md-9">
                                    	<input type="file" name="attach_bill" class="form-control">
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