<?php

namespace App\Http\Controllers;

use App\Events\MaterialHasViewed;
use App\Models\Load;
use App\Models\Match;
use App\Models\News;
use App\Models\Video;
use Cache;
use Request;

class FrontController extends Controller
{
	public function getHome()
	{
		$latestNews = Cache::remember(News::class . '_latest_main', config('liga-fifa.cacheTime'), function () {
			$data = News::with('categories')
				->latest()
				->limit(10)
				->get();
			return $data;
		});

		$latestVideo = Cache::remember(Video::class . '_latest_main', config('liga-fifa.cacheTime'), function () {
			$data = Video::with('categories')
				->latest()
				->limit(12)
				->get();
			$count = $data->count();
			if ($count % 3 != 0) $count = (int)(($count / 3)) * 3;
			return $data->take($count);
		});

		$latestDownloads = Cache::remember(Load::class . '_latest_main', config('liga-fifa.cacheTime'), function () {
			$data = Load::with('categories')
				->latest()
				->limit(10)
				->get();
			return $data;
		});

		$data = array(
			'title' => "Главная",
			'description' => "Описание",
			'latestNews' => $latestNews,
			'latestVideo' => $latestVideo,
			'latestDownloads' => $latestDownloads,
			'breadcrumbs' => array(
				array('NAME' => "Главная"),
			)
		);
		return view('front.index', $data);
	}

	public function getNews($path = false)
	{
		$page = Request::has('page') ? Request::get('page') : 1;
		$posts = array();
		if (!$path) {
			$posts = Cache::remember("news_$page", config('liga-fifa.cacheTime'), function () {
				return News::with('categories')->latest()->paginate(config('liga-fifa.perPage'));
			});
//            dd($posts);
		}
		$data = array(
			'title' => "Новости",
			'description' => "Описание",
			'items' => $posts,
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Новости"),
			)
		);
		return view('front.news.list', $data);
	}

	public function getNewsItem($slug)
	{
		$slug = explode("/", $slug);
		$slug = array_pop($slug);
		$item = Cache::remember("news_$slug", config('liga-fifa.cacheTime'), function () use ($slug) {
			return News::where([
				['slug', '=', $slug],
//				['show', '=', 1],
			])->with('categories', 'tags')->first();
		});
		if ($item) {
			$data = array(
				'title' => $item->name,
				'description' => "Описание",
				'item' => $item
			);
			$data['breadcrumbs'] = array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Новости", 'URL' => "/news"),
			);
			if (!$item->categories->isEmpty()){
				$category = $item->categories->random();
				$data['breadcrumbs'][] = array('NAME' => $category->name, 'URL' => route('news', $category->slug));
			}
			$data['breadcrumbs'][] = array('NAME' => $item->name);
			return view('front.news.item', $data);
		}
		return abort(404, "Page not found");
	}

	public function getVideos($path = false)
	{
		$page = Request::has('page') ? Request::get('page') : 1;
		$items = array();
		if (!$path) {
			$items = Cache::remember(Video::class . "page_$page", config('liga-fifa.cacheTime'), function () {
				return Video::with('categories')->latest()->paginate(config('liga-fifa.perPage'));
			});
		}
		$data = array(
			'title' => "Видео материалы",
			'description' => "Описание",
			'items' => $items,
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Видео материалы"),
			)
		);
		return view('front.video.list', $data);
	}

	public function getVideoItem($slug)
	{
		$slug = explode("/", $slug);
		$slug = array_pop($slug);
		$item = Cache::remember(Video::class . "_$slug", config('liga-fifa.cacheTime'), function () use ($slug) {
			return Video::where([
				['slug', '=', $slug],
//				['show', '=', 1],
			])->with('categories', 'tags')->first();
		});
		if ($item) {
			$data = array(
				'title' => $item->name,
				'description' => "Описание",
				'item' => $item
			);
			$data['breadcrumbs'] = array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Видео материалы", 'URL' => route('video')),
			);
			if (!$item->categories->isEmpty()){
				$category = $item->categories->random();
				$data['breadcrumbs'][] = array('NAME' => $category->name, 'URL' => route('news', $category->slug));
			}
			$data['breadcrumbs'][] = array('NAME' => $item->name);
			return view('front.video.item', $data);
		}
		return abort(404, "Page not found");
	}

	public function getDownloads($path = false)
	{
		$page = Request::has('page') ? Request::get('page') : 1;
		$items = array();
		if (!$path) {
			$items = Cache::remember(Load::class . "page_$page", config('liga-fifa.cacheTime'), function () {
				return Load::with('categories')->latest()->paginate(config('liga-fifa.perPage'));
			});
		}
		$data = array(
			'title' => "Загрузки",
			'description' => "Описание",
			'items' => $items,
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Загрузки"),
			)
		);
		return view('front.downloads.list', $data);
	}

	public function getDownloadsItem($slug)
	{
		$slug = explode("/", $slug);
		$slug = array_pop($slug);
		$item = Cache::remember(Load::class . "_$slug", config('liga-fifa.cacheTime'), function () use ($slug) {
			return Load::where([
				['slug', '=', $slug],
//				['show', '=', 1],
			])->with('categories', 'tags', 'files')->first();
		});
		if ($item) {
			$data = array(
				'title' => $item->name,
				'description' => "Описание",
				'item' => $item
			);
			$data['breadcrumbs'] = array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Загрузки", 'URL' => route('downloads')),
			);
			if (!$item->categories->isEmpty()){
				$category = $item->categories->random();
				$data['breadcrumbs'][] = array('NAME' => $category->name, 'URL' => route('downloads', $category->slug));
			}
			$data['breadcrumbs'][] = array('NAME' => $item->name);
			event(new MaterialHasViewed($item, Load::class));
			return view('front.downloads.item', $data);
		}
		return abort(404, "Page not found");
	}

	public function getOnlineItem($slug)
	{
		$slug = explode("/", $slug);
		$slug = array_pop($slug);
		$item = Cache::remember(Match::class . "_$slug", config('liga-fifa.cacheTime'), function () use ($slug) {
			return Match::where([
				['slug', '=', $slug],
//				['show', '=', 1],
			])->with('league', 'teamHome', 'teamGuest', 'channels', 'year')->first();
		});
		if ($item) {
			$title = $item->teamHome->name . "-" . $item->teamGuest->name;
			$data = array(
				'title' => $title,
				'description' => "Описание",
				'item' => $item
			);
			$data['breadcrumbs'] = array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Трансляции", 'URL' => "/online"),
				array('NAME' => $item->league->name, 'URL' => "/online/" . $item->league->slug),
			);
			$data['breadcrumbs'][] = array('NAME' => $title);
			return view('front.online.item', $data);
		}
//		dd($item);
		return abort(404, "Page not found");
	}

	public function getVideo()
	{
		$data = array(
			'title' => "Видео Материалы",
			'description' => "Описание",
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Видео Материалы"),
			)
		);
		return view('front.videos', $data);
	}

	public function getLoads()
	{
		$data = array(
			'title' => "Файлы",
			'description' => "Описание",
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Файлы"),
			)
		);
		return view('front.loads', $data);
	}

	public function getMaterial()
	{
		$data = array(
			'title' => "Файлы",
			'description' => "Описание",
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Файлы"),
			)
		);
		return view('front.material', $data);
	}
}
