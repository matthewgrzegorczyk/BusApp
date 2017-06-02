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
        	$table->timestamps();
			$table->integer('tickets_amount');
			$table->string('ticket_type');
			$table->string('destination', 255);
			$table->string('full_name', 100);

			// Foreign keys.
			$table->unsignedInteger('user_id');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
