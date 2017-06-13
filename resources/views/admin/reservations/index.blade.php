@extends('admin/base')

@section('content')
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ilość</th>
				<th>Typ</th>
				<th>Cel</th>
				<th>Imie i nazwisko</th>
				<th>Użytkownik</th>
				<th>Edytuj</th>
			</tr>
		</thead>
		@forelse ($reservations as $reservation)
			<tr>
				<td>{{ $reservation->tickets_amount }}</td>
				<td>{{ $reservation->getTicketType() }}</td>
				<td>{{ $reservation->destination }}</td>
				<td>{{ $reservation->full_name }}</td>
				<td>{{ $reservation->user_id }}</td>
				<td><a href="{{ route('admin-reservation-edit', ['reservation' => $reservation->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Nothing to see.</td>
			</tr>
		@endforelse
	</table>
@endsection