<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::create('tags_relations', function (Blueprint $table) {
			$table->integer('tag_id');
			$table->morphs('taggable');
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
		Schema::dropIfExists('tags');
		Schema::dropIfExists('tags_relations');
    }
}
