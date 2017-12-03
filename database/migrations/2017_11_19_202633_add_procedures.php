<?php

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class AddProcedures extends Migration {

		private $table_name = 'drivers';

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {

			Schema::create( $this->table_name, function ( Blueprint $table ) {
				$table->timestamps();
				$table->increments( 'id' );
				$table->string( 'first_name', 50 );
				$table->string( 'last_name', 50 );
				$table->integer( 'jobs_taken' )->unsigned()->default( 0 );
				$table->string( 'status', 255 );

				// Foreign keys.
				$table->unsignedInteger( 'bus_id' )->nullable();
				$table->foreign( 'bus_id' )->references( 'id' )->on( 'bus_lines' );
			} );

			// Procedury
			// 1. Zrealizować procedurę, która będzie zwiększać cenę biletu o wartość podaną przy wywołaniu jako dana wejściowa dla trasy też podanej przy wywołaniu.
			// 2. Wykorzystując funkcję IF zrealizować zapytanie, po wywołaniu którego wyświetlać się będzie przy każdym pracowniku jedna z 3 informacji: "super","jako taki", "marny" w zależności od ilości zrealizowanych kursów.
//    	$procedureIncreaseCost = "CREATE PROCEDURE p_increase_ticket_price (";

			// Wyzwalacze
			// Zrealizować wyzwalacz, który będzie dla kierowców, którzy zrealizowali więcej niż 100 kursów wpisywał do jego statusu "lider przewozów".

//		$trigger = "CREATE TRIGGER t_driver_leader AFTER INSERT ON drivers
//		FOR EACH ROW
//		SET";
//    	DB::unprepared($procedure);
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
//    	$dropProcedures = "DROP PROCEDURE simpleproc;";
//        $triggerDrop = "DROP TRIGGER drivers.t_driver_leader;";
			Schema::table( $this->table_name, function ( Blueprint $table ) {
				$table->dropForeign( [ 'bus_id' ] );
			} );
			Schema::drop( $this->table_name );
		}
	}
