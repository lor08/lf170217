<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('status')->unsigned()->default(0);
			$table->integer('views')->unsigned()->default(0);
			$table->integer('downloads')->unsigned()->default(0);
			$table->timestamps();
			$table->index([ 'category_id' ]);
		});

		Schema::create('files', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('load_id')->unsigned();
			$table->enum('type', ['url', 'file'])->default('file');
			$table->string('url')->nullable();
			$table->string('file')->nullable();
			$table->integer('downloads')->unsigned()->default(0);
			$table->timestamps();
//			$table->index([ 'load_id' ]);
			$table->foreign('load_id')
				->references('id')
				->on('loads')
				->onDelete('cascade');
		});

//		Schema::create('load_file', function (Blueprint $table) {
//			$table->increments('id');
//			$table->integer('load_id')->unsigned();
//			$table->integer('file_id')->unsigned();
//			$table->timestamps();
//			$table->index([ 'load_id', 'file_id' ]);
//		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('loads');
		Schema::dropIfExists('files');
//		Schema::dropIfExists('load_file');
    }
}
