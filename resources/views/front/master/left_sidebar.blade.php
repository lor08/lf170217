<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 14:19
 */
?>
<div class="layout-sidebar">
	<div class="layout-sidebar-backdrop"></div>
	<div class="layout-sidebar-body">
		<div class="custom-scrollbar">
			<nav id="sidenav" class="sidenav-collapse collapse">
				<ul class="sidenav">
					<li class="sidenav-search hidden-md hidden-lg">
						<form class="sidenav-form" action="/">
							<div class="form-group form-group-sm">
								<div class="input-with-icon">
									<input class="form-control" type="text" placeholder="Search…">
									<span class="icon icon-search input-icon"></span>
								</div>
							</div>
						</form>
					</li>

					<li>
						<a href="{{ route('home') }}">
							<span class="sidenav-icon icon icon-home"></span>
							<span class="sidenav-label">Главная</span>
						</a>
					</li>
					<li>
						<a href="{{ route('online-tv') }}">
							<span class="sidenav-icon icon icon-tv"></span>
							<span class="sidenav-label">Online TV</span>
						</a>
					</li>

					<li class="sidenav-heading">Материалы</li>
					<li>
						<a href="{{ route('news') }}">
							<span class="sidenav-icon icon icon-newspaper-o"></span>
							<span class="sidenav-label">Новости сайта</span>
						</a>
					</li>

					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon icon icon-soccer-ball-o"></span>
							<span class="sidenav-label">Футбольные новости</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Футбольные новости</li>
							<li><a href="">Россия</a></li>
							<li><a href="">Англия</a></li>
							<li><a href="">Испания</a></li>
							<li><a href="">Италия</a></li>
							<li><a href="">Германия</a></li>
							<li><a href="">Франция</a></li>
							<li><a href="">Голландия</a></li>
							<li><a href="">Украина</a></li>
							<li><a href="">Остальные</a></li>
						</ul>
					</li>

					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon icon icon-gamepad"></span>
							<span class="sidenav-label">Новости FIFA</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Новости FIFA</li>
							<li><a href="">FIFA 17</a></li>
							<li><a href="">FIFA 16</a></li>
							<li><a href="">FIFA 15</a></li>
							<li><a href="">FIFA 14</a></li>
						</ul>
					</li>

					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon icon icon-video-camera"></span>
							<span class="sidenav-label">Видео материалы</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Видео материалы</li>
							<li><a href="{{ route('video', 'reviews') }}">Видео обзоры</a></li>
							<li><a href="{{ route('video', 'zapisi-matchey') }}">Записи матчей</a></li>
							<li><a href="">Обучение FIFA</a></li>
							<li><a href="">Разное</a></li>
						</ul>
					</li>

					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon icon icon-file"></span>
							<span class="sidenav-label">Файловый архив</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Файловый архив</li>
							<li><a href="">Патчи</a></li>
							<li><a href="">Графика</a></li>
							<li><a href="">Программы</a></li>
							<li><a href="">Дополнения</a></li>
							<li><a href="">Разное</a></li>
						</ul>
					</li>

					<li class="sidenav-heading">Футбол</li>

					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-ru icon"></span>
							<span class="sidenav-label">Россия</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Россия</li>
							<li><a href="">РФПЛ</a></li>
							<li><a href="">ПФЛ</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-gb icon"></span>
							<span class="sidenav-label">Англия</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Англия</li>
							<li><a href="">Англия</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-es icon"></span>
							<span class="sidenav-label">Испания</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Испания</li>
							<li><a href="">Испания</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-it icon"></span>
							<span class="sidenav-label">Италия</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Италия</li>
							<li><a href="">Италия</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-de icon"></span>
							<span class="sidenav-label">Германия</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Германия</li>
							<li><a href="">Германия</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-fr icon"></span>
							<span class="sidenav-label">Франция</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Франция</li>
							<li><a href="">Франция</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-nl icon"></span>
							<span class="sidenav-label">Голландия</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Голландия</li>
							<li><a href="">Голландия</a></li>
						</ul>
					</li>
					<li class="sidenav-item has-subnav">
						<a href="" aria-haspopup="true">
							<span class="sidenav-icon flag-icon flag-icon-ua icon"></span>
							<span class="sidenav-label">Украина</span>
						</a>
						<ul class="sidenav-subnav collapse">
							<li class="sidenav-subheading">Украина</li>
							<li><a href="">Украина</a></li>
						</ul>
					</li>

					<li class="sidenav-heading">Информация</li>
					<li>
						<a href="{{ route('page', 'how_watch') }}">
							<span class="sidenav-icon icon icon-info-circle"></span>
							<span class="sidenav-label">Как смотреть футбол</span>
						</a>
					</li>
					<li>
						<a href="{{ route('page', 'faq') }}">
							<span class="sidenav-icon icon icon-question-circle"></span>
							<span class="sidenav-label">FAQ</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>