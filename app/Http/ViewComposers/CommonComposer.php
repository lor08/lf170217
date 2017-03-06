<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 06.03.17
 * Time: 16:34
 */
namespace App\Http\ViewComposers;

use Cache;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use App\Models\Match;

class CommonComposer
{
	/**
	 * Bind data to the view.
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$online_match = Cache::remember(Match::class . '_online_sidebar', config('liga-fifa.cacheTime'), function() {
			$now = Carbon::now()->format("Y-m-d");
			$tomorrow = Carbon::tomorrow()->addDay()->format("Y-m-d");
			$online_data = Match::with('league', 'teamHome', 'teamGuest', 'channels', 'year')->whereBetween('datetime', [$now, $tomorrow])->get();
			$online_data = $online_data->sortBy('date')->groupBy(function ($item, $key) use ($now) {
				return Carbon::parse($item['datetime'])->format('Y-m-d') == $now ? 'TODAY' : 'TOMORROW';
			});
			return $online_data;
		});

		$view->with(compact('online_match'));
	}
}