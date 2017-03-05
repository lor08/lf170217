<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 04.03.2017
 * Time: 19:19
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Вход</title>
	<meta name="description" content="Вход">
	<meta property="og:url" content="{{url("/login")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Вход">
	<meta property="og:description" content="Вход">
	<meta name="twitter:card" content="summary">
	<link rel="shortcut icon" href="{{ url('img/icons/favicon.png') }}"/>
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-16x16.png")}}" sizes="16x16">
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-32x32.png")}}" sizes="32x32">
	<link rel="apple-touch-icon" sizes="180x180" href="{{url("img/icons/apple-touch-icon.png")}}">
	<link rel="mask-icon" href="{{url("img/icons/safari-pinned-tab.svg")}}" color="#d9230f">
	<link rel="manifest" href="/manifest.json">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
	<link rel="stylesheet" href="{{ url('css/vendor.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/elephant.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/login-2.min.css') }}">
</head>
<body>
<div class="login">
	<div class="login-body">
		<a class="login-brand" href="{{url("/")}}">
			<img class="img-responsive" src="{{url("img/logo.svg")}}" alt="Elephant Theme">
		</a>
		<div class="login-form">
			{!! Form::open(array('data-toggle' => "validator")) !!}
			@include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email', 'required' => true])
			@include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль', 'required' => true, 'minlength' => 6 ])
			<div class="form-group">
				<label class="custom-control custom-control-primary custom-checkbox"\>
					<input class="custom-control-input" type="checkbox" checked="checked" name="remember">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-label">Запомнить меня</span>
				</label>
				<span aria-hidden="true"> · </span>
				<a href="{{url("password-2.html")}}">Восстановить пароль</a>
			</div>
			@include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
			{!! Form::close() !!}
		</div>
	</div>
	<div class="login-footer">
		Нет аккаунта? <a href="{{url("signup-2.html")}}">Зарегистрируйтесь</a>
	</div>
</div>
<script src="{{ url('js/vendor.min.js') }}"></script>
<script src="{{ url('js/elephant.min.js') }}"></script>
</body>
</html>