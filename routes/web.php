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

Route::get('/', function () {
	return view('welcome');
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

	dd($matches);
});
