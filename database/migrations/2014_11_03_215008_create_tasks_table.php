<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
      $table->increments('id');
      $table->integer('todolist_id')->unsigned();;
      $table->text('name');
      $table->date('due');
      $table->boolean('done');
			$table->timestamps();
    });

    Schema::table('tasks', function(Blueprint $table) {
      $table->foreign('todolist_id')->references('id')->on('todolists')->onDelete('cascade');
    });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
