<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 16:46
 */
?>
@extends('front.master.layout')
@section('head')
	<title>{{$title or ""}}</title>
	<meta name="description" content="{{$description or ""}}">
	<meta property="og:url" content="{{url("/")}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{$title or ""}}">
	<meta property="og:description" content="{{$description or ""}}">
	{{--<meta property="og:image" content="">--}}
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
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
						@foreach($items as $item)
							<tr>
								<td><span class="bg-primary circle sq-64 icon icon-cc-visa"></span></td>
								<td class="maw-320" data-order="{{$item->name}}">
									<a href="{{route('downloadsItem', $item->slug)}}"><strong
												class="truncate">{{$item->name}}</strong></a>
								</td>
								<td data-order="{{$item->categories->first()->slug}}">
									<a href="{{route('downloads', $item->categories->first()->slug)}}">{{$item->categories->first()->name}}</a>
								</td>
								<td>Autor</td>
								<td>{{$item->views}}</td>
								<td>{{$item->downloads}}</td>
								<td data-order="{{$item->created_at}}">{{$item->created}}</td>
								<td data-order="{{$item->status}}">
									<span class="label label-info label-pill">New {{$item->status}}</span>
								</td>
								<td>25 Мб</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
