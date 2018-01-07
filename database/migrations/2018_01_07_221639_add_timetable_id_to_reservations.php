<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimetableIdToReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Foreign keys.
            $table->unsignedInteger( 'timetable_id' )->nullable();
            $table->foreign( 'timetable_id' )->references( 'id' )->on( 'timetable' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Drop foreign key.
            Schema::table( $this->table_name, function ( Blueprint $table ) {
                $table->dropForeign( [ 'timetable_id' ] );
            } );
        });
    }
}
