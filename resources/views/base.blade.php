<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Bus Stop</title>
	<meta name="description" content="BusApp">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Place favicon.ico in the root directory -->

	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
	your browser</a> to improve your experience.</p>
<![endif]-->

@include('partials/menu')

<div class="headerContainer"></div>
<div class="container">
	<main id="main">
		@yield('main')
	</main>
</div>

@include('partials/footer')
{{--@include('partials/login-modal')--}}

<script src="/js/app.js"></script>
</body>
</html>