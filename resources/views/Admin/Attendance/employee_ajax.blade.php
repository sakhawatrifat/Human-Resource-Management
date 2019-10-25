<tr>
	@php $i=1 @endphp
	@foreach($employee as $employee_data)
    <td>{{ $i++ }}</td>
    <td>{{ $employee_data->image }}</td>
    <td>{{ $employee_data->employee_name }}</td>
    <td>{{ $employee_data->department }}</td>
    <td>{{ $employee_data->designation }}</td>
    <td>
        <input type="hidden" name="employee_id[]" value="{{ $employee_data->employee_id }}">
    	<input type="checkbox" class="checkboxInput" value="{{ $employee_data->employee_id }}" name="attendance_status[]"> 
    </td>
</tr>
	@endforeach