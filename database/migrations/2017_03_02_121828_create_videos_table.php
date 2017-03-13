<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('preview_text')->nullable();
			$table->string('preview_img')->nullable();
			$table->text('detail_text')->nullable();
			$table->string('detail_img')->nullable();
			$table->unsignedInteger('match_id')->nullable();
			$table->unsignedInteger('status')->default(1);
			$table->unsignedInteger('views')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('videos');
    }
}
