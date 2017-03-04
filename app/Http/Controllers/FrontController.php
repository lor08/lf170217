<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
	public function getHome()
	{
		$data = array(
			'title' => "Главная",
			'description' => "Описание",
			'breadcrumbs' => array(
				array('NAME' => "Главная"),
			)
		);
		return view('front.index', $data);
	}

	public function getNews()
	{
		$data = array(
			'title' => "Новости",
			'description' => "Описание",
			'breadcrumbs' => array(
				array('NAME' => "Главная", 'URL' => "/"),
				array('NAME' => "Новости"),
			)
		);
		return view('front.news', $data);
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
