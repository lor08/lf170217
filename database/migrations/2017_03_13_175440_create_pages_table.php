<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('content')->nullable();
			$table->unsignedInteger('parent_id')->nullable();
			$table->unsignedInteger('views')->default(0);
			$table->unsignedInteger('order')->default(100);
			$table->boolean('status')->default(true);
            $table->timestamps();

			$table->index([ 'parent_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}