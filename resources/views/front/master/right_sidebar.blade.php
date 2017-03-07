{{--{{dd($online_match)}}--}}
<div class="col-md-3 col-big-2" id="rightSidebar">
	<div class="card hidden-xs hidden-sm">
		<div class="card-header">
			<h4 class="card-title">Онлайн трансляции</h4>
		</div>
		<div class="card-body">
			<a href="/dashboard" target="_blank">Админка</a>
			<br>
			<a href="#" onclick="toastr.info('message info','title', {progressBar: true}); return false;">Тестовая всплывашка info</a>
			<br>
			<a href="#" onclick="toastr.success('message success','title', {progressBar: true}); return false;">Тестовая всплывашка success</a>
			<br>
			<a href="#" onclick="toastr.warning('message warning','title', {progressBar: true}); return false;">Тестовая всплывашка warning</a>
			<br>
			<a href="#" onclick="toastr.error('message error','title', {progressBar: true}); return false;">Тестовая всплывашка error</a>
			<br>
			@foreach($online_match as $type => $dateMatch)
				<strong>@lang('messages.' . $type)</strong>
				@foreach($dateMatch as $key => $match)
					<div class="">
						<span class="flag-icon flag-icon-gb"></span>
						<span class="badge @if($match->isOnline) badge-success @else badge-outline-info @endif">{{$match->startTime}}</span>
						<a class="link-muted" href="{{route('onlineItem', $match->slug)}}">{{$match->teamHome->name}} - {{$match->teamGuest->name}}</a>
					</div>
				@endforeach
			@endforeach
{{--			<strong>Сегодня</strong>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-outline-info">22:45</span> <a class="link-muted" href="#">Борнмут
					- Кристал Пэлас</a></div>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал -
					Уотфорд</a></div>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-outline-info">22:45</span> <a class="link-muted" href="#">Борнмут
					- Кристал Пэлас</a></div>
			<strong>Завтра</strong>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал -
					Уотфорд</a></div>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал -
					Уотфорд</a></div>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-outline-info">22:45</span> <a class="link-muted" href="#">Борнмут
					- Кристал Пэлас</a></div>
			<div class=""><span class="flag-icon flag-icon-gb"></span> <span
						class="badge badge-success">22:45</span> <a class="link-muted" href="#">Арсенал -
					Уотфорд</a></div>--}}
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Мы в социальных сетях</h4>
		</div>
		<div class="card-body">
			<!-- VK Widget -->
			<div id="vk_groups"></div>
		</div>
		<div class="card-footer text-center">
			<a class="rounded sq-36 bg-facebook" href="#" title="Share on Facebook"
			   target="_blank"><span class="icon icon-facebook"></span></a>
			<a class="rounded sq-36 bg-twitter" href="#" title="Tweet" target="_blank"><span
						class="icon icon-twitter"></span></a>
			<a class="rounded sq-36 bg-facebook" href="#" title="Vkontakte" target="_blank"><span
						class="icon icon-vk"></span></a>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Партнёры</h4>
		</div>
		<div class="card-body text-center">
			<img src="{{url("img/240_1_1.gif")}}" class="card-img img-responsive" alt="img" title="img"/>
		</div>
	</div>
</div>

@section('scripts')
	<script type="text/javascript" src="http://vk.com/js/api/openapi.js?115"></script>
	<script type="text/javascript">
		VK.Widgets.Group("vk_groups", {
			mode: 0,
			width: "auto",
			height: "350",
			color1: 'FFFFFF',
			color2: '2B587A',
			color3: '5B7FA6'
		}, 57970580);
	</script>
@endsection