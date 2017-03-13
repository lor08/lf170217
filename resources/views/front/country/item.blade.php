<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 04.03.2017
 * Time: 20:44
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
	{{--<meta property="og:image" content="http://themes.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">--}}
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="col-md-7">
		<div class="card">
			<div class="card-header"><h4 class="card-title">Можно будет заголовок сделать</h4></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-middle nowrap">
						<thead>
						<tr>
							<th colspan="4"></th>
							<th><strong>Игры</strong></th>
							<th>Победы</th>
							<th>Ничьи</th>
							<th title="Поражения">Пораж.</th>
							<th>Мячи</th>
							<th><strong>Очки</strong></th>
							<th>% очков</th>
							<th>Форма</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1; ?>
						@foreach($table as $col)
							<tr>
								<td>{{ $i++ }}</td>
								<td></td>
								<td><img src=""></td>
								<td><a href="">{{ $col['name'] or ""}}</a></td>
								<td><strong>{{ $col['games'] or ""}}</strong></td>
								<td>{{ $col['wins'] or ""}}</td>
								<td>{{ $col['draws'] or ""}}</td>
								<td>{{ $col['lost'] or ""}}</td>
								<td>
									<span>{{ $col['ballIn'] or ""}}</span><span>-</span><span>{{ $col['ballOut'] or ""}}</span>
								</td>
								<td><strong>{{ $col['points'] or ""}}</strong></td>
								<td>{{ round(($col['points'] / ($col['games'] * 3) * 100), 2) }}</td>
								<td></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header"><h4 class="card-title">Расписание матчей \ Календарь</h4></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-middle nowrap">
						<thead>
						<tr>
							<th>Тур</th>
							<th>Дата</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($item->league->matches as $match)
							<tr>
								<td>{{ $match->stage }}</td>
								<td>{{ $match->dateFull }}</td>
								<td class="text-right">{{ $match->teamHome->name }}</td>
								<td class="text-center">{{ $match->resHome }}</td>
								<td class="text-center">{{ $match->resGuest }}</td>
								<td class="text-left">{{ $match->teamGuest->name }}</td>
								<td>
									<a href="{{ route('onlineItem', $match->slug) }}">Трансляция</a><br>
									<a href="">Обзор</a><br>
									<a href="">Запись</a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
