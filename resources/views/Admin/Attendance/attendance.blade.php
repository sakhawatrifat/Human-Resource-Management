@extends('home')

@section('content')

@include('_partial.message')
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Attendance Table</h4>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Employee Name</th>
                        <th>Award Name</th>
                        <th>Gift Item</th>
                        <th>Cash Price</th>
                        <th>Month</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    	<td>1</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>System Architect</td>
                        <td>System Architect</td>
                        <td>System Architect</td>
                        <td>System Architect</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection