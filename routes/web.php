<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "FrontController@getHome")->name("home");

Route::get('news/{slug}.htm', 'FrontController@getNewsItem')->where('slug', '[a-zA-Z0-9\-/_]+')->name('newsItem');
Route::get('news/{path?}', "FrontController@getNews")->where('path', '[a-zA-Z0-9\-/_]+')->name("news");

Route::get('videos', "FrontController@getVideo")->name("videos");
Route::get('downloads', "FrontController@getLoads")->name("loads");
Route::get('material', "FrontController@getMaterial")->name("material");

Route::get('login', 'AuthController@login')->name("login");
Route::post('login', 'AuthController@loginProcess');
Route::get('logout', 'AuthController@logoutuser')->name("logout");
Route::get('wait', 'AuthController@wait');











Route::any('/grabber/{param1?}/{param2?}/{param3?}', 'GrabberController@index')->name('grabber');

Route::get('test', function (){
//	$match = App\Models\Match::where('id', 1)->with('league', 'teamHome')->get();
	$str = "Вильярреал (Испания)";
	$str2 = "Вильярреал";
	$pattern = '/\(.*\)/u';
	if (preg_match($pattern, $str, $matches)){
		echo "есть страна: " . str_replace(array('(', ')'), '', $matches[0]);
		echo "\n Клуб: " . trim( str_replace($matches[0], '', $str) );
	} else {
		echo "нормальное название";
	}

//	$config = config('liga-fifa');
//	$config['test'] = 'value 2';
//	$config['test2'] = 'value 3';

	$items = array(
		'perPage' => 10,
		'cacheTime' => 20,
	);

	putConfig("liga-fifa", $items, false);


//	$match = App\Models\Match::where('id', 1)->with('league', 'teamHome')->get();
//	$routeCollection = Route::getRoutes()->getRoutesByMethod();
//	dd($routeCollection);
	dd($matches);
});

/**
 * @param $group
 * @param $items
 * @param bool $update
 */
function putConfig($group, $items, $update = true){
	$config = config($group);
	// Обновляем данные или вносим новые
	if ($update){
		foreach ($items as $key => $item) {
			$config[$key] = $item;
		}
	} else $config = $items;
	$path = config_path() . DIRECTORY_SEPARATOR . $group . ".php";
	File::put($path, '<?php return ' . var_export($config, true) . ';');
}