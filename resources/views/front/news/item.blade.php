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
	<meta property="og:image" content="http://themes.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
	<meta name="twitter:card" content="summary">
@endsection
@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title fw-l">
					{{$item->name}}
				</h2>
			</div>
			<div class="card-body">
				<div class="row gutter-xs">
					<div class="col-md-12">
						<div class="row gutter-xs">
							<div class="col-sm-4 col-md-4">
								<img class="img-responsive" src="{{$item->detail_img}}" alt="{{$item->name}}">
							</div>
							<div class="col-sm-8 col-md-8">
								{!! $item->detail_text !!}
							</div>
						</div>
					</div>
					@unless($item->tags->isEmpty())
						<div class="col-md-12 tags">
							<i><span class="icon icon-tags"></span>
								@foreach($item->tags as $key => $tags)
									@unless($key == 0)/@endunless
									<a href="/tag/{{$tags->name}}">{{$tags->name}}</a>
								@endforeach
							</i>
						</div>
					@endunless
				</div>
			</div>
			<div class="card-footer">
				<small>
					@unless($item->categories->isEmpty())
						<span class="icon icon-folder"></span>
						@foreach($item->categories as $key => $category)
							@unless($key == 0)/@endunless
							<a href="{{route('news', $category->slug)}}">{{$category->name}}</a>
						@endforeach
					@endunless
					<span class="icon icon-calendar"></span> {{$item->created_at}}
					<span class="icon icon-eye"></span> {{$item->views}}
					<span class="icon icon-comment"></span> 22
				</small>
			</div>
		</div>
		@unless($item->related->isEmpty())
		<div class="card related">
			<div class="card-header text-center">
				<strong class="card-title">Похожие материалы</strong>
			</div>
			<div class="card-body">
				<div class="row">
						@foreach($item->related as $key => $related)
							<div class="col-md-3">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title fw-l">
											<a class="link-muted" href="{{route('newsItem', $related->slug)}}">{{$related->name}}</a>
										</h4>
										<small>{!! $related->preview_text !!}</small>
									</div>
									<div class="card-footer">
										<small>
											@unless($related->categories->isEmpty())
												<span class="icon icon-folder"></span>
												@foreach($related->categories as $key => $category)
													@unless($key == 0)/@endunless
													<a href="{{route('news', $category->slug)}}">{{$category->name}}</a>
												@endforeach
											@endunless
											<span class="icon icon-calendar"></span> {{$related->created_at}}
											<span class="icon icon-eye"></span> {{$related->views}}
											<span class="icon icon-comment"></span> 22
										</small>
									</div>
								</div>
							</div>
						@endforeach
				</div>
			</div>
		</div>
		@endunless
	</div>
@endsection
