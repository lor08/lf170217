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

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

Route::get('/', "FrontController@getHome")->name("home");

Route::get('news/{slug}.htm', 'FrontController@getNewsItem')->where('slug', '[a-zA-Z0-9\-/_]+')->name('newsItem');
Route::get('news/{path?}', "FrontController@getNews")->where('path', '[a-zA-Z0-9\-/_]+')->name("news");

Route::get('video/{slug}.htm', 'FrontController@getVideoItem')->where('slug', '[a-zA-Z0-9\-/_]+')->name('videoItem');
Route::get('video/{path?}', "FrontController@getVideos")->where('path', '[a-zA-Z0-9\-/_]+')->name("video");

Route::get('downloads/{slug}.htm', 'FrontController@getDownloadsItem')->where('slug', '[a-zA-Z0-9\-/_]+')->name('downloadsItem');
Route::get('downloads/{path?}', "FrontController@getDownloads")->where('path', '[a-zA-Z0-9\-/_]+')->name("downloads");

Route::get('online/{slug}.htm', 'FrontController@getOnlineItem')->where('slug', '[a-zA-Z0-9\-/_]+')->name('onlineItem');

Route::get('country/{slug?}', "FrontController@getCountry")->where('slug', '[a-zA-Z0-9\-/_]+')->name("country");

Route::get('online-tv', "FrontController@getTv")->name("online-tv");

Route::get('/{slug}.htm', 'FrontController@getPage')->where('slug', '[a-zA-Z0-9\-/_]+')->name('page');

//Route::get('videos', "FrontController@getVideo")->name("videos");
//Route::get('downloads', "FrontController@getLoads")->name("loads");
//Route::get('material', "FrontController@getMaterial")->name("material");

Route::get('login', 'AuthController@login')->name("login");
Route::post('login', 'AuthController@loginProcess');
Route::get('logout', 'AuthController@logoutuser')->name("logout");
Route::get('wait', 'AuthController@wait');


Route::get('fsfesed', function (){
//	$aaa = include public_path('re/fps_news.php');
	$news = File::getRequire( public_path('re/fps_news.php') );
	$newsCat = File::getRequire( public_path('re/fps_news_sections.php') );
//	foreach ($news as $item){
//		$attributes = array(
//			'name' => trim($item['title']),
//			'slug' => str_slug(trim($item['title'])),
//			'preview_text' => trim($item['description']),
//			'detail_text' => trim($item['main']),
//			'views' => $item['views'],
//			'created_at' => $item['date'],
//		);
//		$buffer = new News($attributes);
//		$buffer->save();
//		echo $buffer->id . "<br>";
//	}

	$parent = Category::whereId(2)->first();
	foreach ($newsCat as $item) {
		$attributes = array(
			'name' => $item['title'],
			'slug' => str_slug($item['title']),
		);
		$node = new Category($attributes, $parent);
		$node->save();
	}
//	dd( $parent );
});





Route::get('clear-cache', function(){
	Cache::flush();
});


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

Route::get('create-img', function (){

//	$img = Image::canvas(300, 200);
	$img = Image::make(public_path('images/serie-a-600x300.jpg'));
	$teamHome = Image::make(public_path('images/milan.png'));
	$teamGuest = Image::make(public_path('images/napoli.png'));

//	echo $img->height() . PHP_EOL;
//	echo $teamHome->height() . PHP_EOL;
//	echo $teamGuest->height() . PHP_EOL;

	$img->insert($teamHome->resize(150, 150, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	}), 'left', 50);
	$img->insert($teamGuest->resize(150, 150, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	}), 'right', 50);
	return $img->response();

});

Route::get('icon-match', function (Request $request){

	$images = $request->all();
	if (!isset($images['q']) and !isset($images['w']) and !isset($images['e']))
		return false;
	$img = Image::make(public_path($images['q']))->resize(600, null, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	});
	$teamHome = Image::make(public_path($images['w']));
	$teamGuest = Image::make(public_path($images['e']));

//	echo $img->height() . PHP_EOL;
//	echo $teamHome->height() . PHP_EOL;
//	echo $teamGuest->height() . PHP_EOL;

	$img->insert($teamHome->resize(150, 150, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	}), 'left', 50);
	$img->insert($teamGuest->resize(150, 150, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	}), 'right', 50);
	return $img->response();
//	dd($request->all());

})->name('iconMatch');