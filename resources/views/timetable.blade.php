@extends('base')

@section('main')
	@if (count($bus_lines) > 0)
		<ul class="lines">
			@foreach($bus_lines as $bus_line)
				<li>
					<a href="{{ route('bus_timetable', ['bus_line' => $bus_line->id]) }}"
					   data-line="{{ $bus_line->id }}">
						{{ $bus_line->id }}
					</a>
				</li>
			@endforeach
		</ul>
	@endif
	<table class="timetable table table-striped">
		<thead>
		<tr>
			<th>Godzina</th>
			<th>Dzień powszedni</th>
			<th>Soboty</th>
			<th>Święta</th>
		</tr>
		</thead>
		<tbody>
		@for($i = 0; $i < 24; $i++)
			<tr>
				<td>{{ $i }}</td>
				@foreach($day_types as $day_type)
					<td>
						@if (isset($timetable[$day_type][$i]))
							@foreach ($timetable[$day_type][$i] as $item)
								<span>{{ explode(':', $item->depart_at)[1] }}</span>
							@endforeach
						@endif
					</td>
				@endforeach
			</tr>
		@endfor
		</tbody>
	</table>
@stop