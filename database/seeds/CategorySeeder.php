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
    }
}
