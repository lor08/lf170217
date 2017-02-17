<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('logo')->nullable();
			$table->integer('country_id')->unsigned();
			$table->integer('year_id')->unsigned();
			$table->date('date_start')->nullable();
			$table->date('date_end')->nullable();
			$table->boolean('status')->default(false);
			$table->integer('count_teams')->nullable();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
}
