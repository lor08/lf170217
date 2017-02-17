<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->integer('league_id')->unsigned();
			$table->string('logo')->nullable();
			$table->integer('country_id')->unsigned();
			$table->string('city')->nullable();
			$table->string('coach')->nullable();
			$table->string('stadium')->nullable();
			$table->string('owner')->nullable();
			$table->string('captain')->nullable();
			$table->string('site')->nullable();
			$table->date('founded')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}