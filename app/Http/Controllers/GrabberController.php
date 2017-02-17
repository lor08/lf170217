<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Response;
use App\Models\Match;
use App\Models\Club;

class GrabberController extends Controller
{
	/**
	 * @param Request $request
	 * @param bool $param1
	 * @param bool $param2
	 * @param bool $param3
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(Request $request, $param1 = false, $param2 = false, $param3 = false)
	{
		$data = array();

		switch ($param1) {
			case 1:
				$data = $this->getGoooolMatch($request->get('source'));
				break;
			case 2:
				$data = $this->getGoalOnlineData($request->get('source'));
				break;
			case 3:
				$data = $this->getChampinatNews($param2);
				break;
			case 4:
				$data = $this->getChampionatCalendar($param2, $param3);
				break;
			default:
				$data = array();
				break;
		}

		return Response::json($data);
	}

	/**
	 * @param bool $limit
	 * @return array
	 */
	public function getChampinatNews($limit = false)
	{
		$client = new Client();
		$data = array();

		$lists = $client->request('GET', 'https://www.championat.com/news/football/1.html');

		$lists->filter('.list-articles__i > a.list-articles__i__text')->each(function ($link) use ($client, &$data) {
			$view = $client->click($link->link());

			$title = $link->text();
			$titleH1 = $view->filter('h1.article-head__title')->text();
			$title = (strlen($titleH1)) ? $titleH1 : $title;
			$content = $view->filter('.article-content')->html();

			$data[] = array(
				'name' => trim($title),
				'content' => trim(strip_tags($content, "<br><i>"))
			);
		});
		if ($limit) {
			array_splice($data, $limit);
		}
		return $data;
	}

	/**
	 * @param $T_CODE
	 * @param $T_ID
	 * @return array
	 */
	public function getChampionatCalendar($T_CODE, $T_ID)
	{
		$client = new Client();
		$data = array();
		$page = $client->request('GET', 'https://www.championat.com/football/' . $T_CODE . '/' . $T_ID . '/calendar.html');
		$table = $page->filter('.page__block.sport');
		$table->filter('tbody tr')->each(function ($stroka) use ($client, &$data) {
			$resHome = (int)$stroka->filter('.sport__calendar__table__result a span')->first()->text();
			$resGuest = (int)$stroka->filter('.sport__calendar__table__result a span')->last()->text();
			$datetime = explode(",", trim($stroka->filter('.sport__calendar__table__date')->text()));
			$data[] = array(
				'tur' => $stroka->filter('.sport__calendar__table__tour')->text(),
				'date' => trim($datetime[0]),
				'time' => isset($datetime[1]) ? trim($datetime[1]) : '',
				'teamHome' => $stroka->filter('.sport__calendar__table__teams a')->first()->text(),
				'teamGuest' => $stroka->filter('.sport__calendar__table__teams a')->last()->text(),
				'resHome' => $stroka->filter('.sport__calendar__table__result a span')->first()->text(),
				'resGuest' => $stroka->filter('.sport__calendar__table__result a span')->last()->text(),
				'resTotalHome' => $resHome == $resGuest ? "н" : ($resHome > $resGuest ? "в" : "п"),
				'resTotalGuest' => $resHome == $resGuest ? "н" : ($resHome < $resGuest ? "в" : "п"),
			);
		});
//		array_splice($data, 2);
		$country_id = 2;
		$league_id = 3;
		$year_id = 1;
		foreach ($data as $key => $item) {
//			if ($key == 0) continue;
			$match = new Match();
			$match->league_id = $league_id;
			$match->year_id = $year_id;
			$match->stage = $item['tur'];
			$match->date = $item['date'];
			$match->time = $item['time'];

			$teamHome = Club::where('name', $item['teamHome'])->first();
			if(!$teamHome){
				$teamHome = new Club();
				$teamHome->country_id = $country_id;
				$teamHome->league_id = $league_id;
				$teamHome->name = $item['teamHome'];
				$teamHome->slug = str_slug($item['teamHome']);
				$teamHome->saveOrFail();
			}
			$match->teamHome_id = $teamHome->id;
			$match->resHome = $item['resHome'];

			$teamGuest = Club::where('name', $item['teamGuest'])->first();
			if(!$teamGuest){
				$teamGuest = new Club();
				$teamGuest->country_id = $country_id;
				$teamGuest->league_id = $league_id;
				$teamGuest->name = $item['teamGuest'];
				$teamGuest->slug = str_slug($item['teamGuest']);
				$teamGuest->saveOrFail();
			}
			$match->teamGuest_id = $teamGuest->id;
			$match->resGuest = $item['resGuest'];

			$match->saveOrFail();
			echo $match->id . "\n";
		}
//		dd($data);
		return $data;
	}

	/**
	 * @param $source
	 * @return array
	 */
	public function getGoooolMatch($source)
	{
		$data = array();

		$data = $source;

		return $data;
	}


	/**
	 * @param $param
	 * @return array|bool
	 */
	public function getGoalOnlineData($param)
	{
		/* Заходим на страницу узнаем сколько данных и пиздем все из файлов с помощью цикла, Ура */
		try {
			$client = new Client();
			$data = array();

			if(is_string($param)){
//				$page_url = "http://laravel-dev.local/blabla.html";
				$page = $client->request('GET', $param);
				$frameSrc = $page->filter('.full-story iframe')->eq(0)->attr('src');
			}elseif(is_int($param)){
				$frameSrc = "http://mnogosporta.pro/engine/modules/staticxfwin.php?id=" . $param;
			}

			if (isset($frameSrc)) {
				$page = $client->request('GET', $frameSrc);
				$count = $page->filter('.liveico-link')->count();

				$query_url = parse_url($frameSrc, PHP_URL_QUERY);
				parse_str($query_url, $query_data);

				$id = $query_data['id'];
			}

			if (isset($count) and isset($id)) {
				for ($i = 1; $i <= $count; $i++) {
					$data[] = file_get_contents('http://mnogosporta.pro/uploads/staticxf/' . $id . '_' . $i . '.txt');
				}
			}
			$data = array(
				'content' => implode("\n", $data)
			);
			return $data;
		} catch (\Exception $e) {
			return false;
		}
	}
}
