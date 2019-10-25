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
                <form method="post" action="{{ route('attendance.update',$attendance->att_id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <div class="row col-md-12 pr-0">
                        <div class="col-md-3"></div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label>
                                    <input name="employee_name" type="text" id="firstName" class="form-control" value="{{ $attendance->employee_name }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Employee ID</label>
                                    <input name="employee_id" type="notice_date" id="firstName" class="form-control" value="{{ $attendance->employee_id }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Department</label>
                                    <input name="department" type="notice_date" id="firstName" class="form-control" value="{{ $attendance->department }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Designation</label>
                                    <input name="designation" type="text" id="firstName" class="form-control" value="{{ $attendance->designation }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Date</label>
                                    <input name="date" type="date" id="firstName" class="form-control" value="{{ $attendance->date }}" readonly>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Attendance Status</label>
                                    <select class="form-control custom-select" name="attendance_status">
                                        @if($attendance->attendance_status == 1)
                                        <option value="{{'1'}}">Present</option>
                                        <option value="{{ '0'}}">Absent</option>
                                        @else
                                        <option value="{{ '0'}}">Absent</option>
                                        <option value="{{'1'}}">Present</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                           <div class="col-md-3 pr-0"></div>
                        </div>
                    </div>

                    <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                        <a href="{{ route('award.index') }}">
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection