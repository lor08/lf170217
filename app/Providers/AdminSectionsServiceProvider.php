<?php

namespace App\Providers;

use AdminSection;
use App\Models\Category;
use App\Models\Load;
use App\Models\LoadCategory;
use App\Models\Video;
use App\Models\VideoCategory;
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
use App\Models\File;

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
		Load::class => 'App\Admin\Sections\Load',
		File::class => 'App\Admin\Sections\File',
		Category::class => 'App\Admin\Sections\Category',
		LoadCategory::class => 'App\Admin\Sections\LoadCategory',
		Video::class => 'App\Admin\Sections\Video',
		VideoCategory::class => 'App\Admin\Sections\VideoCategory',
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
			[
				'title' => 'Загрузки',
				'icon' => 'fa fa-download',
				'priority' => 110,
				'pages' => [
					(new Page(Load::class))->setPriority(0)->setTitle('Список')->setIcon('fa fa-list'),
					(new Page(LoadCategory::class))->setPriority(10)->setTitle('Категории')->setIcon('fa fa-folder'),
				]
			],
			[
				'title' => 'Видео',
				'icon' => 'fa fa-video-camera',
				'priority' => 110,
				'pages' => [
					(new Page(Video::class))->setPriority(0)->setTitle('Список')->setIcon('fa fa-list'),
					(new Page(VideoCategory::class))->setPriority(10)->setTitle('Категории')->setIcon('fa fa-folder'),
				]
			],
			(new Page(User::class))->setPriority(130)->setTitle('Грабберы'),
			[
				'title' => 'Настройки',
				'icon' => 'fa fa-cog',
				'priority' => 1000,
				'pages' => [
					[
						'title' => 'Глобальные настройки',
						'icon' => 'fa fa-cog',
						'url' => route('admin.setting'),
						'priority' => 0,
					],
					(new Page(Category::class))->setPriority(10)->setTitle('Дерево категорий')->setIcon('fa fa-folder'),
				]
			],
		]);
	}

	private function registerNRoutes(	)
	{
		$this->app['router']->group(
			[
				'prefix' => config('sleeping_owl.url_prefix'),
				'middleware' => config('sleeping_owl.middleware')
			],
			function ($router) {
				$router->get('', ['as' => 'admin.dashboard']);
				$router->get('setting', ['as' => 'admin.setting']);
			});
	}

	private function registerMediaPackages()
	{
		PackageManager::add('front.controllers')
			->js(null, asset('js/app.js'));
	}
}
