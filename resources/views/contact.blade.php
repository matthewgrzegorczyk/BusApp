@extends('base')
@section('main')
	<h1>{{ __('page.contact.heading') }}</h1>
	@if (!isset($message))
		<form action="" method="post">
			{{ csrf_field() }}
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<input class="form-control"
					   name="email"
					   type="text"
					   placeholder="{{ __('page.contact.placeholders.email') }}">
				<span class="help-block">{{ $errors->first('email') }}</span>
			</div>
			<div class="form-group">
			<textarea class="form-control"
					  name="content"
					  placeholder="{{ __('page.contact.placeholders.content') }}"></textarea>
			</div>
			<input class="btn btn-primary" type="submit" value="{{ __('page.contact.submit') }}" />
		</form>
	@else
		{{ $message }}
	@endif
@stop