@extends('home')

@section('content')
@include('_partial.message')
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Attendance Table</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Employee Image</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Deignation</th>
                        <th>Date</th>
                        <th>Attendance Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($employee as $emp_data)
                    	<td>{{ $i++ }}</td>
                        <td>{{ $emp_data->image }}</td>
                        {{-- <td>
                            <img class="h-10" src="{{ asset('image/'.$emp_data->image) }}">
                        </td> --}}
                        <td>{{ $emp_data->employee_name }}</td>
                        <td>{{ $emp_data->employee_id }}</td>
                        <td>{{ $emp_data->department }}</td>
                        <td>{{ $emp_data->designation }}</td>
                        <td>{{ $emp_data->date }}</td>
                        <td>
                            @if($emp_data->attendance_status == 1)
                            <span class="text-success">Present</span>
                            @else
                            <span class="text-danger">Absent</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('attendance.show',$emp_data->id) }}">
                                @if($emp_data->attendance_status == '1')
                                <button class="btn btn-warning">Absent</button>
                                @else
                                <button class="btn btn-success">Present</button>
                                @endif
                            </a>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection