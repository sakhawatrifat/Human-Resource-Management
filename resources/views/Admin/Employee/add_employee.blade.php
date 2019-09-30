@extends('home')

@section('content')

<div class="row">
    @include('_partial.message')
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
                                        <input type="text" class="form-control" required placeholder="" autofocus="" name="employee_name">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Father Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="fathers_name">
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
                                        <input type="date" class="form-control" required placeholder="dd/mm/yyyy" name="date_of_birth">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" required name="gender">
                                            <option value="">--Select--</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
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
                                        <input type="text" class="form-control" required placeholder="" name="phone">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Present Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="present_address">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Permanent Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" required placeholder="" name="premanent_address">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" required placeholder="" name="email">
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
                                        <input type="password" class="form-control" required placeholder="" name="password">
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
                                        <input type="password" name="password_confirmation" class="form-control" required placeholder="">
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
                                    <label class="control-label text-right col-md-3">Employee ID</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" required name="employee_id">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" required name="department">
                                            <option value="">--Select--</option>
                                            <option>Country 1</option>
                                            <option>Country 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Designation</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" required name="designation">
                                            <option value="">--Select--</option>
                                            <option>Country 1</option>
                                            <option>Country 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date Of Joining</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" required placeholder="dd/mm/yyyy" name="date_of_joining">
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
                                        <input type="text" class="form-control" required name="joining_salary">
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

@endsection