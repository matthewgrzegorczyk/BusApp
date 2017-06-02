<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
            <span class="navbar-brand">
                <i class="fa fa-bus" aria-hidden="true"></i>
            </span>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul id="mainMenu" class="nav navbar-nav">
				<li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="{{ route('about') }}">About</a></li>
				<li><a href="{{ route('timetable') }}">Timetable</a></li>
				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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