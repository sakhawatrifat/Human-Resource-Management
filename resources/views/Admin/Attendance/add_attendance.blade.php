@extends('home')

@section('content')
@include('_partial.message')

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('attendance.store') }}">
        @csrf
            <div class="d-flex justify-content-center">
                <h4>Today:</h4>
                <input class="border-0 m-b-10 col-md-1" value="{{ date('Y-m-d') }}" readonly="" name="date">
            </div>
            <h4 class="card-title text-center p-10">
                Select Department For Employee Attendance
            </h4>
            <div class="d-flex justify-content-center">
                <div class="col-md-2">
                    <select class="form-control department" name="department_name">
                        <option value="">--Select--</option>
                        @foreach($department as $dept)
                        <option value="{{$dept->id}}">{{ $dept->department_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center p-10">
                <label class="control-label">Mark As Present All</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkboxInput mark_all" name="attendance_status"> 
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success">Submit Attendance</button> 
            </div>
            
            <div class="table-responsive m-t-40">
                <table id="myTable" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        	<th>SL.NO</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody class="employee_ajax">
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.department').on('change',function(){
            var department_name = $(this).val();

            $.ajax({
                url:'/employee_ajax_data',
                type:'post',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "department_name": department_name
                },
                success:function(data){
                    $('.employee_ajax').html(data)
                }
            });
        });

        $('.mark_all').on('click',function(){
            if($(this).is(':checked'))
            {
                $('div input').attr('checked',true);
            }
            else
            {
                $('div input').attr('checked',false);
            }
        });
    });
</script>
@endsection