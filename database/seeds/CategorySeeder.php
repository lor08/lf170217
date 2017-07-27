<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$attributes = array(
			'name' => "Загрузки",
			'slug' => "downloads",
		);
		$node = new Category($attributes);
		$node->save();
		$attributes = array(
			'name' => "Новости",
			'slug' => "news",
		);
		$node = new Category($attributes);
		$node->save();
		$attributes = array(
			'name' => "Видео",
			'slug' => "video",
		);
		$parent = new Category($attributes);
		$parent->save();
		$attributes = array(
			'name' => "Видео обзоры",
			'slug' => "reviews",
		);
		$node = Category::create($attributes, $parent);
		$node->save();
		$attributes = array(
			'name' => "Записи матчей",
			'slug' => str_slug("Записи матчей"),
		);
		$node = Category::create($attributes, $parent);
		$node->save();
		$attributes = array(
			'name' => "Аннонсы",
			'slug' => str_slug("Аннонсы"),
		);
		$node = Category::create($attributes, $parent);
		$node->save();
		$attributes = array(
			'name' => "Футбольные передачи",
			'slug' => str_slug("Футбольные передачи"),
		);
		$node = Category::create($attributes, $parent);
		$node->save();
	}
}
