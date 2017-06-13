@extends('admin/base')

@section('content')
	<form action="{{ route('admin-reservation-save', ['reservation' => $reservation->id]) }}" method="post">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<input class="form-control"
				   name="amount"
				   type="number"
				   placeholder="{{ __('page.reserve.placeholders.tickets_amount') }}"
				   value="{{ $reservation->ticket_amount }}">
			<span class="help-block">{{ $errors->first('amount') }}</span>
		</div>
		<div class="form-group">
			<select class="form-control" name="type" id="ticket_type">
				@foreach($ticket_types as $type => $display_name)
					<option value="{{ $type }}" {{ $type === '' ? 'disabled' : '' }} {{ old('type', '') === $type ? 'selected' : '' }}>
						{{ $display_name }}
					</option>
				@endforeach
			</select>
			<span class="help-block">{{ $errors->first('ticket_type') }}</span>
		</div>
		<div class="form-group">
			<input class="form-control"
				   name="destination"
				   type="text"
				   placeholder="{{ __('page.reserve.placeholders.destination') }}" value="{{ old('destination') }}">
			<span class="help-block">{{ $errors->first('destination') }}</span>
		</div>
		<div class="form-group">
			<input class="form-control"
				   name="full_name"
				   type="text"
				   placeholder="{{ __('page.reserve.placeholders.full_name') }}" value="{{ old('full_name') }}">
			<span class="help-block">{{ $errors->first('full_name') }}</span>
		</div>
		<input class="btn btn-primary" type="submit" value="{{ __('page.reserve.submit') }}" />
	</form>
@endsection