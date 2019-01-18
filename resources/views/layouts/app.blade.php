<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">        
		<link rel="stylesheet" href="{{asset("css/app.css")}}">
		<title>{{config("app.name")}}</title>
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		@include("inc.navbar")
		<div class="container">
			@include("inc.messages")
		</div>
		<section class="section">
			<div class="container">
				@yield("content")
			</div>
		</section> 
		<footer class="footer">
			<div class="container">
				<div class="content has-text-centered">
					<p>
						<strong>{{config("app.name")}}</strong> by <a href="https://www.donatus.hu">Donat Marko</a>.
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>
