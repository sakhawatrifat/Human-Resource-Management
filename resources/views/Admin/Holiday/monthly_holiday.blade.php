<tr>
    @php $i=1 @endphp
    @foreach($holiday as $holidays)
	<td>{{ $i++ }}</td>
    <td>{{ $holidays->holiday_name }}</td>
    <td>{{ $holidays->date }}</td>
    <td class="d-inline-flex">
        <a href="{{ route('holiday.edit',$holidays->id) }}">
            <button class="btn btn-info">Edit</button>
        </a>
        <form method="post" action="{{ route('holiday.destroy',$holidays->id) }}">
        @method('delete')
        @csrf
            <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach