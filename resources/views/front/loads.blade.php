<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 17:38
 */
?>
@extends('front.master.layout')
@section('head')
	<title>{{$title or ""}}</title>
	<meta name="description" content="{{$description or ""}}">
	<meta property="og:url" content="{{url("/")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="title">
	<meta property="og:description" content="description">
	<meta property="og:image" content="http://themes.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="col-xs-12 col-md-12">

		<div class="title-bar">
			<h1 class="title-bar-title">
				<span class="d-ib">РФПЛ</span>
				</span>
			</h1>
			<p class="title-bar-description">
				<small>видео обзоры Чемпионата России</small>
			</p>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h4 class="card-title">Последние загруженные файлы</h4></div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="demo-dynamic-tables-1" class="table table-middle nowrap">
						<thead>
						<tr>
							<th></th>
							<th>Название</th>
							<th>Категория</th>
							<th>Автор</th>
							<th><span class="icon icon-eye"></span></th>
							<th><span class="icon icon-download"></span></th>
							<th>Дата</th>
							<th>Статус</th>
							<th>Размер</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td><span class="bg-primary circle sq-64 icon icon-cc-visa"></span></td>
							<td class="maw-320"><a href="#"><strong class="truncate">FIFA 15
										MODDINGWAY MOD 0.5.0</strong></a></td>
							<td><a href="#">Патчи для FIFA</a></td>
							<td>Петя</td>
							<td>15</td>
							<td>7</td>
							<td>21-Янв-2017</td>
							<td><span class="label label-info label-pill">New</span></td>
							<td>25 Мб</td>
						</tr>
						<tr>
							<td><span class="bg-primary circle sq-64 icon icon-cc-visa"></span></td>
							<td class="maw-320"><a href="#"><strong class="truncate">SFIFA 15
										MODDINGWAY MOD 0.5.0</strong></a></td>
							<td><a href="#">Графика для FIFA</a></td>
							<td>Вася</td>
							<td>47</td>
							<td>3</td>
							<td>21-Фев-2017</td>
							<td><span class="label label-primary label-pill">Ban</span></td>
							<td>1.5 Гб</td>
						</tr>
						<tr>
							<td><span class="bg-primary circle sq-64 icon icon-cc-visa"></span></td>
							<td class="maw-320"><a href="#"><strong class="truncate">FIFA
										17</strong></a></td>
							<td><a href="#">FIFA</a></td>
							<td>EA SPORTS</td>
							<td>1570</td>
							<td>179</td>
							<td>27-Сен-2016</td>
							<td><span class="label label-info label-pill">New</span></td>
							<td>25 Гб</td>
						</tr>
						<tr>
							<td><span class="bg-primary circle sq-64 icon icon-cc-visa"></span></td>
							<td class="maw-320"><a href="#"><strong class="truncate">Creation MAster
										17</strong></a></td>
							<td><a href="#">Программы</a></td>
							<td>Иван</td>
							<td>48</td>
							<td>3</td>
							<td>21-Фев-2016</td>
							<td><span class="label label-primary label-pill">Ban</span></td>
							<td>0,8 Мб</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
