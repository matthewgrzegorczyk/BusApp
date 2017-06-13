@extends('base')

@section('main')
	<h1>{{ __('page.my_reservations.heading') }}</h1>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Ilość</th>
			<th>Typ</th>
			<th>Cel</th>
			<th>Imie i nazwisko</th>
			<th>Autobus</th>
		</tr>
		</thead>
		@forelse ($reservations as $reservation)
			<tr>
				<td>{{ $reservation->tickets_amount }}</td>
				<td>{{ $reservation->getTicketType() }}</td>
				<td>{{ $reservation->destination }}</td>
				<td>{{ $reservation->full_name }}</td>
				<td>{{ $reservation->busLine->journey_name ?? 'Brak' }}</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Nothing to see.</td>
			</tr>
		@endforelse
	</table>
@stop