@extends('base')
@section('main')
	<h1>Kontakt</h1>
	<form action="" method="post">
		<div class="form-group">
			<input class="form-control" name="email" type="text" placeholder="Email Address">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="content" placeholder="Twoja wiadomość"></textarea>
		</div>
		<input class="btn btn-primary" type="submit">
	</form>
@stop