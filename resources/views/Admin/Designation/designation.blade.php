@extends('home')

@section('content')
	@include('_partial.message')
    <div class="card-body">
        <!-- Trigger the modal with a button -->
  		<button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add Designation</button>
        <h4 class="card-title">Data Export</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    	@php $i=1 @endphp
                    	@foreach($designation as $designation_data)
                    	<td>{{$i++}}</td>
                        <td>{{$designation_data->designation_name}}</td>
                        <td>
                        	<a href="{{route('designation.edit',$designation_data->id)}}">
                        		<button class="btn btn-primary">Edit</button>
                        	</a>
                        	<button class="btn btn-danger">Delete</button>
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
          <h4 class="modal-title float-left">Designation Info</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="{{ url('designation') }}" class="form-horizontal">
                	@csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Designation</label>
                                    <div class="col-md-9">
                                    	{{-- {{Form::text('designation_name','',['class'=>'form-control'])}} --}}
                                        <input type="text" name="designation_name" class="form-control" placeholder="Type Here">
                                        {{-- <small class="form-control-feedback"> This is inline help </small>  --}}
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
                                    <div class="col-md-offset-3 col-md-9">
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