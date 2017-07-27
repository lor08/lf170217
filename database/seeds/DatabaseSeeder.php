<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(RoleSeeder::class);
		$this->call(CountrySeeder::class);
		$this->call(CategorySeeder::class);

		// News::truncate();
		// factory(News::class, 100)->create();
    }
}
