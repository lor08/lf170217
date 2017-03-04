<?php

use App\Models\Country;
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
			'name' => "Россия",
			'slug' => str_slug("Russian"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Англия",
			'slug' => str_slug("England"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Испания",
			'slug' => str_slug("Spain"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Италия",
			'slug' => str_slug("Italy"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Германия",
			'slug' => str_slug("Germany"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Франция",
			'slug' => str_slug("France"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Голландия",
			'slug' => str_slug("Holland"),
		);
		$country = new Country($attributes);
		$country->save();
		$attributes = array(
			'name' => "Украина",
			'slug' => str_slug("Ukraine"),
		);
		$country = new Country($attributes);
		$country->save();
    }
}