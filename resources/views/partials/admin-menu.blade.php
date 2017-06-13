<ul class="nav nav-pills nav-stacked">
	<li role="presentation" class="{{ (Route::currentRouteName() == 'admin-index') ? 'active' : '' }}">
		<a href="{{ route('admin-index') }}">Home</a>
	</li>
	<li role="presentation" class="{{ (Route::currentRouteName() == 'admin-reservations') ? 'active' : '' }}">
		<a href="{{ route('admin-reservations') }}">Reservations</a>
	</li>
</ul>