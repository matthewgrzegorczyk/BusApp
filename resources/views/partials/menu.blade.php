<nav class="navbar navbar-default navbar-inverse">
	<div class="container">
		<div class="navbar-header">
            <span class="navbar-brand">
                <i class="fa fa-bus" aria-hidden="true"></i>
            </span>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul id="mainMenu" class="nav navbar-nav">
				@foreach ($menu as $menu_item)
					<li @if(Route::currentRouteName() == $menu_item)class="active"@endif>
						<a href="{{ route($menu_item) }}">{{ __('nav.' . $menu_item) }}</a></li>
				@endforeach
				{{--<li @if(Route::currentRouteName() == 'home')class="active"@endif><a href="{{ route('home') }}">{{ __('nav.home') }} <span class="sr-only">(current)</span></a></li>--}}
				{{--<li><a href="{{ route('about') }}">{{ __('nav.about') }}</a></li>--}}
				{{--<li><a href="{{ route('timetable') }}">{{ __('nav.timetable') }}</a></li>--}}
				{{--<li><a href="{{ route('contact') }}">{{ __('nav.contact') }}</a></li>--}}
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li @if(Route::currentRouteName() == 'login')class="active"@endif>
						<a href="{{ route('login') }}">{{ __('auth.headings.login') }}</a></li>
					<li @if(Route::currentRouteName() == 'register')class="active"@endif>
						<a href="{{ route('register') }}">{{ __('auth.headings.register') }}</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							@if(!Auth::guest() && Auth::user()->name === 'admin')<li><a href="{{ route('admin-index') }}">Admin</a></li>@endif
							<li><a href="{{ route('my-reservations') }}">Moje rezerwacje</a></li>
							<li>
								<a href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('auth.labels.logout') }}
								</a>
								<form id="logout-form"
									  action="{{ route('logout') }}"
									  method="POST"
									  style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>