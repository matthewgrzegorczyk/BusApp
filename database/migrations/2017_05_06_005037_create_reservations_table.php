<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateReservationsTable extends Migration
{
	private $table_name = 'reservations';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
        	$table->increments('id');
        	$table->timestamps();
			$table->integer('tickets_amount');
			$table->string('ticket_type');
			$table->string('destination', 255);
			$table->string('full_name', 100);
			$table->dateTime('date')->default(\Carbon\Carbon::now());

			// Foreign keys.
			$table->unsignedInteger('user_id')->nullable();
			$table->unsignedInteger('bus_id')->nullable();

			$table->foreign('user_id')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table($this->table_name, function (Blueprint $table) {
    		$table->dropForeign(['user_id']);
		});
        Schema::dropIfExists($this->table_name);
    }
}
