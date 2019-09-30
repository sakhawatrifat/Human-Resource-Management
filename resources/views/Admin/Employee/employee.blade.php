@extends('home')

@section('content')

<div class="card">
    <div class="card-body">
    	<a href="{{ route('employee.create') }}">
  			<button type="button" class="btn btn-info btn-sm float-right">+ Add Employee</button>
  		</a>

        <h4 class="card-title">Employee List</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Employee ID</th>
                        {{-- <th>Image</th> --}}
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Dept. & Desig.</th>
                        <th>Date Of Joining</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php $i=1 @endphp
                        @foreach($employee as $employee_data)
                    	<td>{{ $i++ }}</td>
                        <td>{{ $employee_data->employee_id }}</td>
                        {{-- <td><img src="{{asset('image/'. $employee_data->image)}}" onerror="this.src='{{asset('image/blank_image.png')}}'"></td> --}}
                        <td>{{ $employee_data->employee_name }}</td>
                        <td>{{ $employee_data->phone }}</td>
                        <td>
                            <p class="font-weight-bold d-inline-flex">Department:</p> {{ $employee_data->department }}
                            <br>
                            <p class="font-weight-bold d-inline-flex">Designation:</p> {{ $employee_data->designation }}
                        </td>
                        <td>{{ $employee_data->date_of_joining }}</td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection