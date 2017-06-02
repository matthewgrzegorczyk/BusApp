<div class="myModal">
	<div class="container">
		<form id="loginForm" action="" class="form-inline">
			{{ csrf_field() }}
			<input class="form-control" id="username" name="username" type="text" placeholder="Nazwa Użytkownika">
			<input class="form-control" id="userpass" name="userpass" type="password" placeholder="Hasło">
			<input class="btn btn-sm btn-default" type="submit" value="OK">
		</form>
		<div class="errors">
			<p class="text-center">Podane dane do logowania są nieprawidłowe.</p>
		</div>
	</div>
</div>