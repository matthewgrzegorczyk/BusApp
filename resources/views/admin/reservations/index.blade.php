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
				<th>Actions</th>
			</tr>
		</thead>
		@forelse ($reservations as $reservation)
			<tr>
				<td>{{ $reservation->tickets_amount }}</td>
				<td>{{ $reservation->getTicketType() }}</td>
				<td>{{ $reservation->destination }}</td>
				<td>{{ $reservation->full_name }}</td>
				<td>{{ $reservation->user_id }}</td>
				<td>
					<a href="{{ route('admin-reservation-edit', ['reservation' => $reservation->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="{{ route('admin-reservation-delete', ['reservation' => $reservation->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Nothing to see.</td>
			</tr>
		@endforelse
	</table>
@endsection