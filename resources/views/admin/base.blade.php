@extends('base')

@section('main')
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				@include('partials/admin-menu')
			</div>
			<div class="col-md-10">
				@yield('content')
			</div>
		</div>
	</div>
@endsection