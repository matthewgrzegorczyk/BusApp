<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusLinesTable extends Migration
{
	private $table_name = 'bus_lines';

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
			$table->string('name', 100);
			$table->string('journey_name', 100);
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
