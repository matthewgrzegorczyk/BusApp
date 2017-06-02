<nav class="navbar navbar-inverse">
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
		</div>
	</div>
</nav>