<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 13.03.2017
 * Time: 18:28
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Страница не найдена</title>
	<meta name="description" content="Страница не найдена">
	<meta property="og:url" content="{{url("/error")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Страница не найдена">
	<meta property="og:description" content="Страница не найдена">
	<meta name="twitter:card" content="summary">
	<link rel="shortcut icon" href="{{ url('img/icons/favicon.png') }}"/>
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-16x16.png")}}" sizes="16x16">
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-32x32.png")}}" sizes="32x32">
	<link rel="apple-touch-icon" sizes="180x180" href="{{url("img/icons/apple-touch-icon.png")}}">
	<link rel="mask-icon" href="{{url("img/icons/safari-pinned-tab.svg")}}" color="#d9230f">
	<link rel="manifest" href="{{url("/manifest.json")}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
	<link rel="stylesheet" href="{{ url('css/vendor.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/elephant.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/errors.min.css') }}">
</head>
<body>
<div class="error">
	<div class="error-body">
		<h1 class="error-heading">404</h1>
		<h4 class="error-subheading">К сожалению, запрошенная страница не найдена.</h4>
		<p>
			<small>URL-адрес может быть написан с ошибкой или страница, которую вы ищете, больше не доступна. Если вы думаете, что прибыли сюда по нашей ошибке, пожалуйста <a href="{{ route('page', 'contact') }}">напишите нам</a>.</small>
		</p>
		<p><a class="btn btn-primary btn-pill btn-thick" href="{{ route('home') }}">Вернуться на главную</a></p>
	</div>
	<div class="error-footer">
		<ul class="list-inline">
			<li>
				<a class="link-muted" href="#">
					<span class="icon icon-twitter icon-2x"></span>
				</a>
			</li>
			<li>
				<a class="link-muted" href="#">
					<span class="icon icon-facebook-official icon-2x"></span>
				</a>
			</li>
			<li>
				<a class="link-muted" href="#">
					<span class="icon icon-linkedin icon-2x"></span>
				</a>
			</li>
		</ul>
		<p>
			<small>2008-{{date('Y')}} &copy; LIGA-FIFA.RU</small>
		</p>
	</div>
</div>
<script src="{{ url('js/vendor.min.js') }}"></script>
<script src="{{ url('js/elephant.min.js') }}"></script>
</body>
</html>
