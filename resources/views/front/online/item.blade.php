<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 06.03.17
 * Time: 14:04
 */
$channels_collection = $item->channels->groupBy('type');
//dd($channels_collection->isEmpty());
?>
@extends('front.master.layout')
@section('head')
	<title>Смотреть онлайн {{$title or ""}}</title>
	<meta name="description" content="{{$description or ""}}">
	<meta property="og:url" content="{{url("/")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="title">
	<meta property="og:description" content="description">
	<meta property="og:image" content="{{ url("/icon-match?q={$item->league->logo}&w={$item->teamHome->logo}&e={$item->teamGuest->logo}") }}">
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title fw-l">
					Смотреть онлайн {{$title}} прямая видео трансляция on-line
				</h2>
			</div>
			<div class="card-body">
				<div class="row gutter-xs">
					<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
						<div class="row gutter-xs text-center">
							<div class="col-xs-4 col-sm-4 col-md-4">
								<img class="img-responsive" src="/{{$item->teamHome->logo}}"
									 alt="{{$item->teamHome->name}}" title="{{$item->teamHome->name}}">
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<span class="badge badge-outline-info">Vs</span>
								<br>
								@if($item->isOnline)
									<span class="badge badge-success">ONLINE</span>
								@else
									<span class="badge badge-danger">OFFLINE</span>
								@endif
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<img class="img-responsive" src="/{{$item->teamGuest->logo}}"
									 alt="{{$item->teamGuest->name}}" title="{{$item->teamGuest->name}}">
							</div>
						</div>
					</div>
				</div>
				<div class="row gutter-xs">
					<div class="col-md-12 text-center">
						<p>Начало {{$item->startDate}} в {{$item->startTime}} | {{$item->league->name}} {{$item->year->name}}. {{$title}} онлайн</p>
						<p>Матч {{$title}} в HD, посмотрело {{$item->views}} человек(а)</p>
						<p>Смотреть онлайн {{$title}} | Прямая видео трансляция матча {{$title}}</p>

						@if(!$item->isOnline and !$item->isFinished)
							<p>Ссылки на трансляцию будут доступны за 15 минут до начала матча</p>
							<p>Матч начнется {{$item->dateForHumans}}</p>
						@endif
						@if($item->isFinished)
							<p>Матч завершен, ожидайте обзоры и запись матча</p>
						@endif
					</div>
					@unless($channels_collection->isEmpty())
					<div class="col-md-12">
						<ul class="nav nav-tabs">
							@foreach($channels_collection as $type => $channels)
								@if($type == 'code')
									@foreach($channels as $key => $channel)
										<li @if($key == 0)class="active"@endif><a data-toggle="tab" href="#{{$type}}{{$key+1}}">Канал {{$key+1}}</a></li>
									@endforeach
								@elseif($type == 'acetream')
									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">Торрент<b class="caret"></b></a>
										<ul class="dropdown-menu">
											@foreach($channels as $key => $channel)
												<li><a data-toggle="tab" href="#{{$type}}{{$key+1}}">Торрент {{$key+1}}</a></li>
											@endforeach
										</ul>
									</li>
								@elseif($type == 'sopcast')
									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">SopCast<b class="caret"></b></a>
										<ul class="dropdown-menu">
											@foreach($channels as $key => $channel)
												<li><a href="{{$channel->content}}">SopCast {{$key+1}}</a></li>
											@endforeach
										</ul>
									</li>
								@endif
							@endforeach
						</ul>
						<div class="tab-content text-center">
							@foreach($channels_collection as $type => $channels)
								@foreach($channels as $key => $channel)
									<div role="tabpanel" id="{{$type}}{{$key+1}}" class="tab-pane fade @if($key == 0 and $type == 'code')in active @endif">{!! $channel->content !!}</div>
								@endforeach
							@endforeach
						</div>
					</div>
					@endunless
					<div class="col-md-12 tags">
						<i><span class="icon icon-tags"></span> <a href="#">pariatur</a>,<a href="#">vero</a>,<a
									href="#">distinctio</a>,<a href="#">quos</a></i>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="pull-left">
					<small>
						<span class="icon icon-folder"></span> {{$item->league->name}} {{$item->year->name}}
						<span class="icon icon-calendar"></span> {{$item->startDate}}
						<span class="icon icon-eye"></span> {{$item->views}}
						{{--<span class="icon icon-comment"></span> 22--}}
					</small>
				</div>
				<div class="pull-right">
					<div class="pluso" data-background="transparent"
						 data-options="small,round,line,horizontal,counter,theme=04"
						 data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
{{--		<div class="card related">
			<div class="card-header text-center">
				<strong class="card-title">Похожие материалы</strong>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title fw-l">
									<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
								</h4>
								<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur
									vero sequi distinctio non eum qui soluta saepe…
								</small>
							</div>
							<div class="card-footer">
								<small>
									<span class="icon icon-folder"></span> Видео Обзоры
									<span class="icon icon-calendar"></span> 22 Янв
									<span class="icon icon-eye"></span> 325
									<span class="icon icon-comment"></span> 22
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title fw-l">
									<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
								</h4>
								<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur
									vero sequi distinctio non eum qui soluta saepe…
								</small>
							</div>
							<div class="card-footer">
								<small>
									<span class="icon icon-folder"></span> Видео Обзоры
									<span class="icon icon-calendar"></span> 22 Янв
									<span class="icon icon-eye"></span> 325
									<span class="icon icon-comment"></span> 22
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title fw-l">
									<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
								</h4>
								<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur
									vero sequi distinctio non eum qui soluta saepe…
								</small>
							</div>
							<div class="card-footer">
								<small>
									<span class="icon icon-folder"></span> Видео Обзоры
									<span class="icon icon-calendar"></span> 22 Янв
									<span class="icon icon-eye"></span> 325
									<span class="icon icon-comment"></span> 22
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title fw-l">
									<a class="link-muted" href="#">10 things not to miss in <span class="nowrap">San Francisco</span></a>
								</h4>
								<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic pariatur
									vero sequi distinctio non eum qui soluta saepe…
								</small>
							</div>
							<div class="card-footer">
								<small>
									<span class="icon icon-folder"></span> Видео Обзоры
									<span class="icon icon-calendar"></span> 22 Янв
									<span class="icon icon-eye"></span> 325
									<span class="icon icon-comment"></span> 22
								</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>--}}
	</div>
@endsection
