<?php

use App\Models\Country;
use App\Models\LeagueYear;
use App\Models\League;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$attributes = array(
			'name' => "2016/2017",
		);
		$year = new LeagueYear($attributes);
		$year->save();
		$attributes = array(
			'name' => "Россия",
			'icon' => "ru",
			'slug' => str_slug("Russian"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "РФПЛ",
			'slug' => str_slug("rfpl"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Англия",
			'icon' => "gb",
			'slug' => str_slug("England"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "АПЛ",
			'slug' => str_slug("apl"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Испания",
			'icon' => "es",
			'slug' => str_slug("Spain"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "spain",
			'slug' => str_slug("spayn"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Италия",
			'icon' => "it",
			'slug' => str_slug("Italy"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Seria a",
			'slug' => str_slug("seria a"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Германия",
			'icon' => "de",
			'slug' => str_slug("Germany"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "bundes",
			'slug' => str_slug("bundes"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Франция",
			'icon' => "fr",
			'slug' => str_slug("France"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "League 1",
			'slug' => str_slug("league 1"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Голландия",
			'icon' => "hl",
			'slug' => str_slug("Holland"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Украина",
			'icon' => "ua",
			'slug' => str_slug("Ukraine"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Европа",
			'slug' => str_slug("europa"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Лига чемпионов",
			'slug' => str_slug("Лига чемпионов"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
		$attributes = array(
			'name' => "Лига Европы",
			'slug' => str_slug("Лига Европы"),
			'country_id' => $country->id,
			'year_id' => $year->id,
		);
		$league = new League($attributes);
		$league->save();
    }
}