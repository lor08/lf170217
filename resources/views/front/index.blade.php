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
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Последние новости</h4>
			</div>
		</div>
		<div class="row gutter-xs">
			@foreach($latestNews as $key => $news)
				<div class="@if($key == 0 or $key > 4) col-md-12 @else col-md-6 h400 @endif">
					<div class="card">
						@if($key == 0 or $key < 5)
							<div class="card-image">
								<img class="img-responsive" src="{{$news->preview_img}}"
									 alt="{{$news->name}}" title="{{$news->name}}">
							</div>
						@else
							<div class="card-header">
								<h4 class="card-title">
									<a class="link-muted" href="{{route('newsItem', $news->slug)}}">{{$news->name}}</a>
								</h4>
							</div>
						@endif
						<div class="card-body @if($key > 1 and $key < 5) h135 @endif">
							@if($key == 0 or $key < 5)
								<h4 class="card-title @if($key != 0) min-h40 @endif">
									<a class="link-muted" href="{{route('newsItem', $news->slug)}}">{{$news->name}}</a>
								</h4>
							@endif
							<small>{!! $news->preview_text !!}</small>
						</div>
						<div class="card-footer">
							<small>
								@unless($news->categories->isEmpty())
									<span class="icon icon-folder"></span>
									@foreach($news->categories as $cat_key => $category)
										@unless($cat_key == 0)
											/
										@endunless
										<a href="{{route('news', $category->slug)}}">{{$category->name}}</a>
									@endforeach
								@endunless
								<span class="icon icon-calendar"></span> {{$news->created}}
								<span class="icon icon-eye"></span> {{$news->views}}
								{{--<span class="icon icon-comment"></span> 22--}}
							</small>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<a href="{{url('/news')}}" class="btn btn-primary btn-sm btn-block">Посмотреть все</a>
	</div>
	<div class="col-md-7">
		<div class="row gutter-xs">
			@foreach($latestVideo as $key => $video)
				<div class="col-xs-6 col-md-4">
					<div class="card">
						<a class="card-img overlay overlay-hover" href="{{route('videoItem', $video->slug)}}">
							<div class="overlay-gradient">
								<img class="card-img img-responsive" src="/img/8525358731.jpg"
									 alt="{{$video->name}}" title="{{$video->name}}">
							</div>
							<div class="overlay-content">
								<div class="overlay-content overlay-top overlay-slide-right">
									<h4 class="overlay-title">{{$video->name}}</h4>
								</div>
								<div class="overlay-content overlay-bottom hidden-xs">
									<div class="media">
										<div class="media-body media-middle">
											@unless($video->categories->isEmpty())
												<span class="icon icon-folder"></span>
												@foreach($video->categories as $cat_key => $category)
													@unless($cat_key == 0)
														/
													@endunless
													{{$category->name}}
												@endforeach
											@endunless
											<span class="icon icon-calendar"></span> {{$video->created}}
											<span class="icon icon-eye"></span> {{$video->views}}
											{{--<span class="icon icon-comment"></span> 22--}}
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			@endforeach
			{{--
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Лас-Пальмас – Валенсия обзор матча
									(30.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-slide-left">
								<div class="fh">
									<div class="fh-m">
										<h4 class="text-center">Наполи - Палермо обзор матча
											(29.01.2017)</h4>
									</div>
								</div>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Реал Мадрид - Реал Сосьедад обзор матча
									(29.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Лас-Пальмас – Валенсия обзор матча
									(30.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-slide-left">
								<div class="fh">
									<div class="fh-m">
										<h4 class="text-center">Наполи - Палермо обзор матча
											(29.01.2017)</h4>
									</div>
								</div>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Реал Мадрид - Реал Сосьедад обзор матча
									(29.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Лас-Пальмас – Валенсия обзор матча
									(30.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-slide-left">
								<div class="fh">
									<div class="fh-m">
										<h4 class="text-center">Наполи - Палермо обзор матча
											(29.01.2017)</h4>
									</div>
								</div>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="card">
					<a class="card-img overlay overlay-hover" href="#">
						<div class="overlay-gradient">
							<img class="card-img img-responsive" src="img/8525358731.jpg"
								 alt="Golden Gate Bridge, San Francisco">
						</div>
						<div class="overlay-content">
							<div class="overlay-content overlay-top overlay-slide-right">
								<h4 class="overlay-title">Реал Мадрид - Реал Сосьедад обзор матча
									(29.01.2017)</h4>
							</div>
							<div class="overlay-content overlay-bottom hidden-xs">
								<div class="media">
									<div class="media-body media-middle">
										<span class="icon icon-folder"></span> Видео Обзоры
										<span class="icon icon-eye"></span> 325
										<span class="icon icon-comment"></span> 22
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			--}}
		</div>
		<div class="row gutter-xs">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"><h4 class="card-title">Последние загруженные файлы</h4></div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="demo-dynamic-tables-1" class="table table-middle nowrap">
								<thead>
								<tr>
									<th>Категория</th>
									<th>Название</th>
									<th>Дата</th>
									<th>Статус</th>
									<th>Размер</th>
								</tr>
								</thead>
								<tbody>
								@foreach($latestDownloads as $key => $downloads)
									<tr>
										<td data-order="{{$downloads->categories->first()->name}}">
											<strong><a href="{{route('downloads', $downloads->categories->first()->slug)}}">{{$downloads->categories->first()->name}}</a></strong>
										</td>
										<td class="maw-320" data-order="{{$downloads->name}}">
											<span class="truncate"><a href="{{route('downloadsItem', $downloads->slug)}}">{{$downloads->name}}</a></span>
										</td>
										<td data-order="{{$downloads->created_at}}">{{$downloads->created}}</td>
										<td data-order="1">
											<span class="label label-info label-pill">{{$downloads->status}} New</span>
										</td>
										<td data-order="{{$downloads->id}}">{{$downloads->id}} Мб</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection