@extends('home')

@section('content')
@include('_partial.message')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Employee Information Form</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('department.update',$department->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <div class="row col-md-12 pr-0">
                    	<div class="col-md-3"></div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="control-label">Department Name</label>
                                    <input type="text" name="department_name" class="form-control" value="{{$department->department_name}}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    @php $dept_id = $department->id;
                                        $designation = App\Designation::where('department_id',$dept_id)->get();
                                    @endphp
                                    @foreach($designation as $desig_data)
                                    <input type="text" name="designation_name[]" class="form-control m-b-10" value="{{ $desig_data->designation_name }}">
                                    @endforeach
                                </div>
                            </div>
                           <div class="col-md-3 pr-0"></div>
                    	</div>

                        {{-- Javascript Append Here --}}
                        <div class="row col-md-12 pr-0 addDesignation">
                        
                        </div>

                        {{-- Add Row Button --}}
                        <div class="row col-md-12 pr-0">
                        <div class="col-md-3"></div>
                            <div class="form-group col-md-6 m-t-10 text-right p-0" >
                                <a href="#" class="btn btn-info btn-sm addRaw"><i class="fas fa-plus"></i> Add Designation</a>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                    <div class="form-actions text-center p-20">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                        <a href="{{ route('department.index') }}">
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.addRaw').on('click',function(){
            event.preventDefault();
            var html = '<div class="col-md-12 row justify-content-center">\
            <div class="col-md-3"></div>\
                            <div class="col-md-6 m-b-10 d-inline-flex">\
                                <input type="text" name="designation_name[]" class="form-control col-md-12 m-l-5">\
                                <a href="#" class="btn btn-info btn-sm remove"><i class="fas fa-times m-t-10"></i></a>\
                            </div>\
                        <div class="col-md-3"></div>\
                        </div>';
            $('.addDesignation').append(html);
        });
        $('.addDesignation').on('click','.remove',function(){
            event.preventDefault();
            $(this).closest('div').remove();
        });
    });
</script>

@endsection