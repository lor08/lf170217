<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use SleepingOwl\Admin\Navigation\Page;
use PackageManager;
use App\User;
use App\Models\Country;
use App\Models\League;
use App\Models\LeagueYear;
use App\Models\Club;
use App\Models\Match;
use App\Models\Chanel;

class AdminSectionsServiceProvider extends ServiceProvider
{

	/**
	 * @var array
	 */
	protected $sections = [
		User::class => 'App\Admin\Sections\Users',
		Country::class => 'App\Admin\Sections\Country',
		League::class => 'App\Admin\Sections\League',
		LeagueYear::class => 'App\Admin\Sections\LeagueYear',
		Club::class => 'App\Admin\Sections\Club',
		Match::class => 'App\Admin\Sections\Match',
		Chanel::class => 'App\Admin\Sections\Chanel',
	];

	/**
	 * Register sections.
	 *
	 * @return void
	 */
	public function boot(\SleepingOwl\Admin\Admin $admin)
	{
		parent::boot($admin);

		$this->registerNRoutes();
		$this->registerNavigation();
		$this->registerMediaPackages();
	}

	private function registerNavigation()
	{
		\AdminNavigation::setFromArray([
			[
				'title' => 'Футбол',
				'icon' => 'fa fa-group',
				'priority' => 100,
				'pages' => [
					(new Page(Country::class))->setPriority(0)->setTitle('Страны'),
					(new Page(League::class))->setPriority(10)->setTitle('Соревнования'),
					(new Page(Club::class))->setPriority(20)->setTitle('Клубы'),
					(new Page(Match::class))->setPriority(30)->setTitle('Матчи'),
					(new Page(LeagueYear::class))->setPriority(100)->setTitle('Справочник годов'),
				]
			],
			(new Page(User::class))->setPriority(110)->setTitle('Грабберы'),
		]);
	}

	private function registerNRoutes()
	{
		$this->app['router']->group(
			[
				'prefix' => config('sleeping_owl.url_prefix'),
				'middleware' => config('sleeping_owl.middleware')
			],
			function ($router) {
				$router->get(
					'',
					[
						'as' => 'admin.dashboard',
						function () {
						$content = 'Define your dashboard here.';
						return AdminSection::view($content, 'Dashboard');
					}
					]);
			});
	}

	private function registerMediaPackages()
	{
		PackageManager::add('front.controllers')
			->js(null, asset('js/app.js'));
	}
}