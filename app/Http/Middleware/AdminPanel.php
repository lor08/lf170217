<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 04.03.2017
 * Time: 19:03
 */

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;

class AdminPanel
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Sentinel::guest()) return redirect('login');
		if (Sentinel::inRole('admin')) return $next($request);
		return Redirect::back();
	}
}