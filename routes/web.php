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
use App\Models\Video;
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

Route::get('stat/{uri}', function($uri){
	// dd($uri);
    return redirect('/video/' . $uri, 301); 
});

// Last router .htm
Route::get('/{slug}.htm', 'FrontController@getPage')->where('slug', '[a-zA-Z0-9\-/_]+')->name('page');

//Route::get('videos', "FrontController@getVideo")->name("videos");
//Route::get('downloads', "FrontController@getLoads")->name("loads");
//Route::get('material', "FrontController@getMaterial")->name("material");

Route::get('login', 'AuthController@login')->name("login");
Route::post('login', 'AuthController@loginProcess');
Route::get('logout', 'AuthController@logoutuser')->name("logout");
Route::get('wait', 'AuthController@wait');





Route::get('fsfesed', function (){

// Импорт новостей
if (false) {
	//	$aaa = include public_path('re/fps_news.php');
		$news = File::getRequire( public_path('re/fps_news.php') );
		// $newsCat = File::getRequire( public_path('re/fps_news_sections.php') );
		$newsAttach = File::getRequire( public_path('re/fps_news_attaches.php') );
		$newsAttach = collect($newsAttach);
		foreach ($news as $item){
			$attributes = array(
				'name' => trim($item['title']),
				'slug' => STRtranslit(trim($item['title'])),
				'preview_text' => trim($item['description']),
				'detail_text' => trim($item['main']),
				'views' => $item['views'],
				'created_at' => $item['date'],
			);
			if ($newsAttach->where('entity_id', $item['id'])->count()){
				if ($img = $newsAttach->where('entity_id', $item['id'])->first()) {
					$attributes['preview_img'] = 'archiv/' . $img['filename'];
				}
			}
			$buffer = new News($attributes);
			$buffer->save();
			$buffer->categories()->attach(2);
			echo $buffer->id . "<br>";
		}

		// $parent = Category::whereId(2)->first();
		// foreach ($newsCat as $item) {
		// 	$attributes = array(
		// 		'name' => $item['title'],
		// 		'slug' => str_slug($item['title']),
		// 	);
		// 	$node = new Category($attributes, $parent);
		// 	$node->save();
		// }
}
// Импорт видео
if (false) {
	$video = File::getRequire( public_path('re/fps_stat.php') );
	$cat = [ 1 => 6, 2 => 5, 3 => 5, 4 => 4, 5 => 7 ];
	$cnt = 0;
	foreach ($video as $key => $item){
		// if ($key > 12000) break;
		// if ($key < 9001) continue;
		$attributes = array(
			'name' => trim($item['title']),
			'slug' => STRtranslit(trim($item['title'])),
			'preview_img' => trim($item['sourse_site']),
			'preview_text' => trim($item['description']),
			'detail_text' => trim($item['main']),
			'views' => $item['views'],
			'created_at' => $item['date'],
		);
		$buffer = new Video($attributes);
		$buffer->save();
		if ($item['category_id'] > 0) {
			if (in_array($item['category_id'], $cat)) {
				$buffer->categories()->attach($cat[$item['category_id']]);
			} else {
				$buffer->categories()->attach(3);
			}
		}
		// echo $buffer->id . "<br>";
		$cnt++;
	}	
	echo "Итого $cnt штук";
}


	// dd( $video[10775] );
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











// Транслит из старого движка
function STRtranslit($str) {
	$cirilic = array('й', 'ц', 'у', 'к', 'е', 'н', 'г', 'ш', 'щ', 'з', 'х', 'ъ', 'ф', 'ы', 'в', 'а', 'п', 'р', 'о', 'л', 'д', 'ж', 'э', 'я', 'ч', 'с', 'м', 'и', 'т', 'ь', 'б', 'ю', 'ё', 'Й', 'Ц', 'У', 'К', 'Е', 'Н', 'Г', 'Ш', 'Щ', 'З', 'Х', 'Ъ', 'Ф', 'Ы', 'В', 'А', 'П', 'Р', 'О', 'Л', 'Д', 'Ж', 'Э', 'Я', 'Ч', 'С', 'М', 'И', 'Т', 'Ь', 'Б', 'Ю', 'Ё');
	$latinic = array('i', 'c', 'u', 'k', 'e', 'n', 'g', 'sh', 'sh', 'z', 'h', '', 'f', 'y', 'v', 'a', 'p', 'r', 'o', 'l', 'd', 'j', 'e', 'ya', 'ch', 's', 'm', 'i', 't', '', 'b', 'yu', 'yo', 'i', 'c', 'u', 'k', 'e', 'n', 'g', 'sh', 'sh', 'z', 'h', '', 'f', 'y', 'v', 'a', 'p', 'r', 'o', 'l', 'd', 'j', 'e', 'ya', 'ch', 's', 'm', 'i', 't', '', 'b', 'yu', 'yo');

	$title = str_replace($cirilic, $latinic, $str);
	$title = strtolower(preg_replace('#[^a-z0-9]#i', '_', $title));
	$title = preg_replace('/(_)+/', '_', $title);
	$title = preg_replace('/(_)$/', '', $title);	

	return $title;
}