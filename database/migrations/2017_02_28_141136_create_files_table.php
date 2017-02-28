<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('file');
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('status')->unsigned()->default(0);
			$table->integer('views')->unsigned()->default(0);
			$table->integer('downloads')->unsigned()->default(0);
			$table->timestamps();
			$table->index([ 'category_id' ]);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
