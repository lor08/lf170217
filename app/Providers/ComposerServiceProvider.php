<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 06.03.17
 * Time: 16:32
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer(
			'*', 'App\Http\ViewComposers\CommonComposer'
		);
//		view()->composer(
//			'*', 'App\Http\ViewComposers\CommonComposer'
//		);
//		view()->composer(
//			'layouts.sidebar', 'App\Http\ViewComposers\SidebarComposer'
//		);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}