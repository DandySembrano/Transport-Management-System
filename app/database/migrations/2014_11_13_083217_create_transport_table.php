<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transport', function(Blueprint $table){
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('vehicle_id');
			$table->string('destination', 255);
			$table->string('description', 255);
			$table->integer('tonnes');
			$table->integer('charges');
			$table->text('memo', 255)->nullable();
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
		Schema::drop('transport');
	}

}
