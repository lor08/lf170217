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
	<meta property="og:title" content="title">
	<meta property="og:description" content="description">
	<meta property="og:image" content="http://themes.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h2>
			</div>
			<div class="card-body">
				<img class="img" src="img/7943544458.jpg" width="200px" alt="Golden Gate Bridge, San Francisco">
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde
					minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde
					minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe.Esse quibusdam voluptatibus quos, unde
					minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe.…
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
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
			</div>
			<div class="card-body">
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
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
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
			</div>
			<div class="card-body">
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
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
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
			</div>
			<div class="card-body">
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
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
	<div class="col-md-6">
		<div class="card">
			<div class="card-image">
				<img class="img-responsive" src="img/7943544458.jpg"
					 alt="Golden Gate Bridge, San Francisco">
			</div>
			<div class="card-body">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
				</small>
			</div>
			<div class="card-footer">
				<small>
					<span class="icon icon-folder"></span> Видео Обзоры
					<span class="icon icon-calendar"></span> 22 Янв
					<br>
					<span class="icon icon-eye"></span> 325
					<span class="icon icon-comment"></span> 22
				</small>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-image">
				<img class="img-responsive" src="img/7943544458.jpg"
					 alt="Golden Gate Bridge, San Francisco">
			</div>
			<div class="card-body">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
				</small>
			</div>
			<div class="card-footer">
				<small>
					<span class="icon icon-folder"></span> Видео Обзоры
					<span class="icon icon-calendar"></span> 22 Янв
					<br>
					<span class="icon icon-eye"></span> 325
					<span class="icon icon-comment"></span> 22
				</small>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-image">
				<img class="img-responsive" src="img/7943544458.jpg"
					 alt="Golden Gate Bridge, San Francisco">
			</div>
			<div class="card-body">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
				</small>
			</div>
			<div class="card-footer">
				<small>
					<span class="icon icon-folder"></span> Видео Обзоры
					<span class="icon icon-calendar"></span> 22 Янв
					<br>
					<span class="icon icon-eye"></span> 325
					<span class="icon icon-comment"></span> 22
				</small>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-image">
				<img class="img-responsive" src="img/7943544458.jpg"
					 alt="Golden Gate Bridge, San Francisco">
			</div>
			<div class="card-body">
				<h4 class="card-title fw-l">
					<a class="link-muted" href="#">10 things not to miss in <span
								class="nowrap">San Francisco</span></a>
				</h4>
				<small>Esse quibusdam voluptatibus quos, unde minima incidunt voluptatum hic
					pariatur vero sequi distinctio non eum qui soluta saepe…
				</small>
			</div>
			<div class="card-footer">
				<small>
					<span class="icon icon-folder"></span> Видео Обзоры
					<span class="icon icon-calendar"></span> 22 Янв
					<br>
					<span class="icon icon-eye"></span> 325
					<span class="icon icon-comment"></span> 22
				</small>
			</div>
		</div>
	</div>
	<div class="row text-center">
		<ul class="pagination">
			<li class="paginate_button previous disabled"><a href="#">«</a></li>
			<li class="paginate_button active"><a href="#">1</a></li>
			<li class="paginate_button "><a href="#">2</a></li>
			<li class="paginate_button "><a href="#">3</a></li>
			<li class="paginate_button "><a href="#">4</a></li>
			<li class="paginate_button next"><a href="#">»</a></li>
		</ul>
	</div>
@endsection