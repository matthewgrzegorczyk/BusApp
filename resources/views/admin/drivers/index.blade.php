@extends('admin/base')

@section('content')
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Ilość przejazdów</th>
			<th>Status</th>
		</tr>
		</thead>
		@forelse ($drivers as $driver)
			<tr>
				<td>{{ $driver->first_name }}</td>
				<td>{{ $driver->last_name }}</td>
				<td>{{ $driver->jobs_taken }}</td>
				<td>{{ $driver->status }}</td>
				<td>
					<a href="{{ route('admin-reservation-edit', ['reservation' => $driver->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="{{ route('admin-reservation-delete', ['reservation' => $driver->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Nothing to see.</td>
			</tr>
		@endforelse
	</table>
@endsection