<?php
use Illuminate\Http\Request;

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::get('setting', ['as' => 'admin.setting', function () {
	$content = '';
	$config = config("liga-fifa");
	$data['title'] = "Глобальные настройки";
	$data['config'] = $config;
	$content .= view('admin.setting', $data);
	return AdminSection::view($content, $data['title']);
}]);
Route::post('setting', ['as' => 'admin.setting', function (Request $request) {
	$newConfig = $request->all();
	unset($newConfig['_token']);
	putConfig("liga-fifa", $newConfig);
	return back()->withInput();
}]);
//Route::any('setting', [
//	'as' => 'admin.setting',
//	'uses' => '\App\Http\Controllers\SettingController@index',
//]);