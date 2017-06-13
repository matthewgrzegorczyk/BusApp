<ul class="nav nav-pills nav-stacked">
	<li role="presentation" class="{{ (Route::currentRouteName() == 'admin-index') ? 'active' : '' }}">
		<a href="{{ route('admin-index') }}">Panel</a>
	</li>
	<li role="presentation" class="{{ (Route::currentRouteName() == 'admin-reservations') ? 'active' : '' }}">
		<a href="{{ route('admin-reservations') }}">Rezerwacje</a>
	</li>
</ul>