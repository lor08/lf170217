<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Match;
use App\Models\Club;

class Grabber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grabber:match
    						{country_id : ID country on site}
    						{league_id : ID league on site}
    						{year_id : ID year on site}
    						{country_idx : Country slug on grabbing site}
    						{league_idx : ID league on grabbing site}
    						{type? : Type on match:calendar(is default match of league), playoff, group, preliminary}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grabbing match for site';

    protected $start_time = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->start_time = time();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//    	exit();
//		$arguments = $this->arguments();
		$country_id = $this->argument('country_id');
		$league_id = $this->argument('league_id');
		$year_id = $this->argument('year_id');
		$T_CODE = $this->argument('country_idx');
		$T_ID = $this->argument('league_idx');
		$type = "calendar" . $this->argument('type');

		$client = new Client();
		$data = array();
		$page = $client->request('GET', 'https://www.championat.com/football/' . $T_CODE . '/' . $T_ID . '/'.$type.'.html');
		$table = $page->filter('.page__block.sport');
		$count_data = $table->filter('tbody tr')->count();
		$this->line("Grabbing data:");
		$bar = $this->output->createProgressBar( $count_data );
		$table->filter('tbody tr')->each(function ($stroka) use ($client, &$data, $bar) {
			$teamHome 	= $stroka->filter('.sport__calendar__table__teams a')->first();
			$teamHome	= $teamHome->count() ? $teamHome->text() : null;
			$teamGuest 	= $stroka->filter('.sport__calendar__table__teams a')->last();
			$teamGuest	= $teamGuest->count() ? $teamGuest->text() : null;
			$dateNode 	= $stroka->filter('.sport__calendar__table__date');

			$tur 		= $stroka->filter('.sport__calendar__table__tour');
			$tur		= $tur->count() ? $tur->text() : null;
			$group 		= $stroka->filter('.sport__calendar__table__group');
			$group		= $group->count() ? $group->text() : null;

			$resHome 	= $stroka->filter('.sport__calendar__table__result a span')->first();
			$resHome	= $resHome->count() ? $resHome->text() : null;
			$resGuest 	= $stroka->filter('.sport__calendar__table__result a span')->last();
			$resGuest	= $resGuest->count() ? $resGuest->text() : null;

			if (!$teamHome and !$teamGuest){
				return false;
			}

			if ($dateNode->count()){
				$date = explode(", ", trim($dateNode->text()));
				if (isset($date[1]) and $date[1] == "пер."){
					$date = new \DateTime($date[0]);
				} else {
					$date = new \DateTime(trim($dateNode->text()));
				}
			}
			$data[] = array(
				'stage' => $group ? trim($group) : trim($tur),
				'datetime' => isset($date) ? $date->format('Y-m-d H:i') : null,
				'teamHome' => trim($teamHome),
				'teamGuest' => trim($teamGuest),
				'resHome' => trim($resHome),
				'resGuest' => trim($resGuest),
//				'resTotalHome' => $resHome == $resGuest ? "н" : ($resHome > $resGuest ? "в" : "п"),
//				'resTotalGuest' => $resHome == $resGuest ? "н" : ($resHome < $resGuest ? "в" : "п"),
			);

			$bar->advance();
		});
		$bar->finish();

		$this->line("\nCreate or Update data:");
		$bar = $this->output->createProgressBar( $count_data );
		foreach ($data as $key => $item) {
			$unstring = md5($country_id . $league_id . $year_id . $item['teamHome'] . $item['teamGuest']);
			$match = Match::where('unstring', $unstring)->first();
			if($match){
				$match->datetime = $item['datetime'];
				$match->resHome = $item['resHome'];
				$match->resGuest = $item['resGuest'];
			}else{
				$match = new Match();
				$match->league_id = $league_id;
				$match->year_id = $year_id;
				$match->stage = $item['stage'];
				$match->datetime = $item['datetime'];
				$match->unstring = $unstring;

				$teamHome = Club::where('name', $item['teamHome'])->first();
				if (!$teamHome) {
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
				if (!$teamGuest) {
					$teamGuest = new Club();
					$teamGuest->country_id = $country_id;
					$teamGuest->league_id = $league_id;
					$teamGuest->name = $item['teamGuest'];
					$teamGuest->slug = str_slug($item['teamGuest']);
					$teamGuest->saveOrFail();
				}
				$match->teamGuest_id = $teamGuest->id;
				$match->resGuest = $item['resGuest'];
			}
			$match->saveOrFail();
			$bar->advance();
		}
		$bar->finish();

		$time_execute = time() - $this->start_time;
		$this->info("\nGrabbing execute! Execute time: " . $time_execute);
//		$this->error("Grabbing fail");
    }
}
