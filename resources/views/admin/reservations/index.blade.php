@extends('admin/base')

@section('content')
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Amount</th>
				<th>Type</th>
				<th>Destination</th>
				<th>Full Name</th>
				<th>User</th>
			</tr>
		</thead>
		@forelse ($reservations as $reservation)
			<tr>
				<td>{{ $reservation->tickets_amount }}</td>
				<td>{{ $reservation->ticket_type }}</td>
				<td>{{ $reservation->destination }}</td>
				<td>{{ $reservation->full_name }}</td>
				<td>{{ $reservation->user_id }}</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Nothing to see.</td>
			</tr>
		@endforelse
	</table>
@endsection