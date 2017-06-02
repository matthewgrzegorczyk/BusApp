<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableTable extends Migration
{
	private $table_name = 'timetable';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create($this->table_name, function (Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
			$table->string('day_type', 10);
			$table->time('depart_at');

			// Foreign keys.
			$table->integer('bus_id')->unsigned();
			$table->foreign('bus_id')->references('id')->on('bus_lines');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table($this->table_name, function(Blueprint $table) {
			$table->dropForeign(['bus_id']);
		});

		Schema::dropIfExists($this->table_name);
    }
}
