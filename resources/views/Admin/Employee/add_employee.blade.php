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
                <form method="post" action="{{ route('employee.store') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="box-title">Personal Info</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Employee Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" autofocus="" name="employee_name" value="{{ old('employee_name') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Father Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="fathers_name" value="{{ old('fathers_name') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" required placeholder="dd/mm/yyyy" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Gender</label>
                                    <div class="col-md-9">
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio3" name="gender" type="radio" class="custom-control-input" value="male">
                                                <span class="custom-control-label">Male</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio4" name="gender" type="radio" class="custom-control-input" value="female">
                                                <span class="custom-control-label">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Phone</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Present Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="present_address" value="{{ old('present_address') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" required placeholder="" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Permanent Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="premanent_address" value="{{ old('premanent_address') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" required placeholder="" name="password" value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Employee Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password_confirmation" class="form-control" required placeholder="" value="{{ old('password_confirmation') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 class="box-title">Official Info</h3>
                        <hr class="m-t-0 m-b-40">
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select dept_id" required name="department_name">
                                            <option value="">--Select--</option>
                                            @foreach($department as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Employee ID</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" required name="employee_id" value="{{ old('employee_id') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Designation</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select desig_data" required name="designation_name">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date Of Joining</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" required placeholder="dd/mm/yyyy" name="date_of_joining" value="{{ old('date_of_joining') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Joining Salary</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required name="joining_salary" value="{{ old('joining_salary') }}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Resume</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" required name="resume">
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

                                        <a href="{{ route('employee.index') }}">
                                        	<button type="button" class="btn btn-inverse">Cancel</button>
                                        </a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dept_id').on('change',function(){
            var department_id = $(this).val();
            
            $.ajax({
                url: '/designation_data',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "department_id":department_id
                },
                success:function(data){
                    $('.desig_data').html(data);
                }
            });
        });
    });
</script>
@endsection