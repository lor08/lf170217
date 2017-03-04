<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 13:58
 */
?>
		<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	@yield('head')
	<link rel="shortcut icon" href="{{ url('img/icons/favicon.png') }}"/>
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-16x16.png")}}" sizes="16x16">
	<link rel="icon" type="image/png" href="{{url("img/icons/favicon-32x32.png")}}" sizes="32x32">
	<link rel="apple-touch-icon" sizes="180x180" href="{{url("img/icons/apple-touch-icon.png")}}">
	<link rel="mask-icon" href="{{url("img/icons/safari-pinned-tab.svg")}}" color="#d9230f">
	<link rel="manifest" href="/manifest.json">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
	<link rel="stylesheet" href="{{ url('css/vendor.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/elephant.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/application.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/dashboard-3.css') }}">
	<link rel="stylesheet" href="{{ url('css/demo.min.css') }}">
</head>
<body class="layout layout-header-fixed layout-sidebar-fixed layout-sidebar-sticky">
@include('front.master.header')
<div class="layout-main">
	@include('front.master.left_sidebar')
	<div class="layout-content">
		<div class="layout-content-body">

			<div class="row gutter-xs" style="margin-right: -15px;">
				<div class="col-md-9 col-big-10">

					<div class="title-bar" id="mainTitle">
						<h1 class="title-bar-title">
							<span class="d-ib">{{$title or "Интернет Лига FIFA"}}</span>
							<span class="d-ib">
                <div class="pluso" data-background="none;"
					 data-options="small,square,line,horizontal,counter,sepcounter=1,theme=14" data-services=""></div>
              </span>
						</h1>
						<p class="title-bar-description">
							<small>{{$description or ""}}</small>
						</p>
					</div>

					<div class="row" id="breadcrumb">
						<div class="card">
							<div class="card-body">
								@foreach($breadcrumbs as $key => $item)
									@unless ($key == 0)
										<span class="icon icon-angle-double-right"></span>
									@endunless
									@if(isset($item['URL']))
										<a href="{{$item['URL']}}">{{$item['NAME']}}</a>
									@else
										{{$item['NAME']}}
									@endif
								@endforeach
							</div>
						</div>
					</div>

					<div class="row hidden" id="fleshMessage">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Информация панель</h3>
							</div>
							<div class="panel-body">
								тут будет флешка
							</div>
						</div>
					</div>

					<div class="row gutter-xs" id="content">
						<div class="col-md-12 visible-xs">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Онлайн трансляции</h4>
								</div>
								<div class="card-body">
									<strong>Сегодня</strong>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-outline-info">22:45</span> <a class="link-muted"
																								 href="#">Борнмут
											- Кристал Пэлас</a></div>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал
											-
											Уотфорд</a></div>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-outline-info">22:45</span> <a class="link-muted"
																								 href="#">Борнмут
											- Кристал Пэлас</a></div>
									<strong>Завтра</strong>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал
											-
											Уотфорд</a></div>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал
											-
											Уотфорд</a></div>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-outline-info">22:45</span> <a class="link-muted"
																								 href="#">Борнмут
											- Кристал Пэлас</a></div>
									<div class=""><span class="flag-icon flag-icon-gb"></span> <span
												class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал
											-
											Уотфорд</a></div>
								</div>
							</div>
						</div>
						@yield('content')
					</div>
				</div>
				@include('front.master.right_sidebar')
			</div>

		</div>
	</div>
	@include('front.master.footer')
</div>
<div class="theme-panel theme-panel-collapsed hidden">
	<input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
	<input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
	<input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
	<input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
	<input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
</div>
<script src="{{ url('js/vendor.min.js') }}"></script>
<script src="{{ url('js/elephant.min.js') }}"></script>
<script src="{{ url('js/application.min.js') }}"></script>
<script src="{{ url('js/demo.js') }}"></script>
<script type="text/javascript">(function () {
		if (window.pluso)if (typeof window.pluso.start == "function") return;
		if (window.ifpluso == undefined) {
			window.ifpluso = 1;
			var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
			s.type = 'text/javascript';
			s.charset = 'UTF-8';
			s.async = true;
			s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
			var h = d[g]('body')[0];
			h.appendChild(s);
		}
	})();</script>
@yield('scripts')
</body>
</html>