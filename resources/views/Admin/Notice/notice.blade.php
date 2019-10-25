@extends('home')

@section('content')
@include('_partial.message')

<div class="card">
    <div class="card-body">
    	<!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Notice</button>

        <h4 class="card-title">Notice List</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Notice Date</th>
                        <th>Attachment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($notice as $notices)
                        <td>{{ $i++ }}</td>
                        <td>{{ $notices->title }}</td>
                        <td>{{ $notices->description }}</td>
                        <td>{{ $notices->notice_date }}</td>
                        <td>
                            @if(!$notices->attachment)
                            <span class="text-danger">No File</span>
                            @else
                            <a class="btn btn-success" href="{{ asset('file/'.$notices->attachment) }}" download>Download</a>
                            @endif
                        </td>
                        <td>
                            @if($notices->status=='1')
                            <span class="text-success">Active</span>
                            @else
                            <span class="text-warning">Inactive</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('notice.edit',$notices->id) }}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="{{ route('notice.show',$notices->id) }}">
                                @if($notices->status=='1')
                                <button class="btn btn-warning">Inactive</button>
                                @else
                                <button class="btn btn-success">Active</button>
                                @endif
                            </a>
                            <form method="post" action="{{ route('notice.destroy',$notices->id) }}">
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
          <h4 class="modal-title float-left">Notice Form</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="{{ route('notice.store') }}" class="form-horizontal" enctype="multipart/form-data">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" placeholder="" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Description</label>
                                    <div class="col-md-9">
                                    	<textarea rows="3" name="description" class="form-control" placeholder="">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Notice Date</label>
                                    <div class="col-md-9">
                                    	<input type="date" name="notice_date" class="form-control" placeholder="" value="{{ old('notice_date') }}"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Attachment</label>
                                    <div class="col-md-9">
                                    	<input type="file" name="attachment" class="form-control" placeholder="" value="{{ old('attachment') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="status">
                                        	<option value="">--Select--</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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