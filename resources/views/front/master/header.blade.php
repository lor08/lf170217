<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 03.03.17
 * Time: 14:19
 */
?>
<div class="layout-header">
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand navbar-brand-center" href="{{url("/")}}">
				<img class="navbar-brand-logo" src="{{url("img/logo-inverse.svg")}}" alt="LIGA FIFA">
			</a>
			<button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
					data-target="#sidenav">
				<span class="sr-only">Toggle navigation</span>
				<span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
				<span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
			</button>
			<button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
					data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="arrow-up"></span>
				<span class="ellipsis ellipsis-vertical">
					<img class="ellipsis-object" width="32" height="32" src="{{url("img/icon-x.png")}}" alt="Teddy Wilson">
            	</span>
			</button>
		</div>
		<div class="navbar-toggleable">
			<nav id="navbar" class="navbar-collapse collapse">
				<button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true"
						type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
				</button>
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden-xs hidden-sm">
						<form class="navbar-search navbar-search-collapsed">
							<div class="navbar-search-group">
								<input class="navbar-search-input" type="text"
									   placeholder="Search for people, companies, and more&hellip;">
								<button class="navbar-search-toggler" title="Expand search form ( S )"
										aria-expanded="false" type="submit">
									<span class="icon icon-search icon-lg"></span>
								</button>
								<button class="navbar-search-adv-btn" type="button">Advanced</button>
							</div>
						</form>
					</li>
					<li><a href="">Россия</a></li>
					<li><a href="">Англия</a></li>
					<li><a href="">Испания</a></li>
					<li><a href="">Италия</a></li>
					<li><a href="">Германия</a></li>
					<li><a href="">Франция</a></li>
					<li><a href="">Голландия</a></li>
					<li><a href="">Украина</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>