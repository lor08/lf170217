<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chanels', function (Blueprint $table) {
        	$table->increments('id');
			$table->unsignedInteger('match_id');
			$table->enum('type', ['code', 'sopcast', 'acetream', 'other']);
			$table->text('content');
			$table->index([ 'match_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chanels');
    }
}
