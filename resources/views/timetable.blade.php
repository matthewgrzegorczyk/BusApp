@extends('base')

@section('main')
	@if (count($bus_lines) > 0)
		<ul class="lines">
			@foreach($bus_lines as $bus_line)
				<li class="{{ isset($current_line) && $current_line->id == $bus_line->id ? 'active' : '' }}">
					<a href="{{ route('bus-timetable', ['bus_line' => $bus_line->id]) }}"
					   data-line="{{ $bus_line->id }}">
						{{ $bus_line->id }}
					</a>
				</li>
			@endforeach
		</ul>
	@endif
	@if (isset($timetable))
		<h3>({{ $current_line->id }}) {{ $current_line->name }}</h3>
		<table class="timetable table table-striped">
			<thead>
			<tr>
				<th>{{ __('page.timetable.hour') }}</th>
				<th>{{ __('page.timetable.day_type.workday') }}</th>
				<th>{{ __('page.timetable.day_type.saturday') }}</th>
				<th>{{ __('page.timetable.day_type.holiday') }}</th>
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
									<span><a href="{{ route('reserve', ['bus_line' => $item->bus_id, 'timetable' => $item->id]) }}">{{ explode(':', $item->depart_at)[1] }}</a></span>
								@endforeach
							@endif
						</td>
					@endforeach
				</tr>
			@endfor
			</tbody>
		</table>
	@endif
@stop