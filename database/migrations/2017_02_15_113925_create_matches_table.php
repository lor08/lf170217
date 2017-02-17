<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');

			$table->integer('league_id')->unsigned();
			$table->integer('year_id')->unsigned();

			$table->string('stage')->nullable();
			$table->integer('teamHome_id')->unsigned();
			$table->integer('resHome')->unsigned()->nullable();
			$table->integer('teamGuest_id')->unsigned();
			$table->integer('resGuest')->unsigned()->nullable();

			$table->text('announce')->nullable();

			$table->dateTime('date')->nullable();
			$table->time('time')->nullable();

			$table->integer('view')->unsigned()->default(0);
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
        Schema::dropIfExists('matches');
    }
}
