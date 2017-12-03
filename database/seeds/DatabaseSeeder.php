<?php

	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
//         $this->call(UsersTableSeeder::class);

			// Seeding BusLines.
			$this->command->info( "Seeding Buslines ..." );
			$buses = factory( App\Models\BusLine::class, 30 )->create();

			if ( $buses instanceof \Illuminate\Database\Eloquent\Collection ) {
				$this->command->info( "Number of inserted buslines records: " . $buses->count() );
			}

			// Seeding drivers - same amount as the buslines.
			$this->command->info( "Seeding drivers ..." );
			$drivers = factory( \App\Models\Driver::class, 30 )->create();

			if ( $drivers instanceof \Illuminate\Database\Eloquent\Collection ) {
				$this->command->info( "Number of inserted drivers records: " . $drivers->count() );
			}
			$this->command->info( "Seeding timetable ..." );
			$timetable = factory( App\Models\Timetable::class, 3000 )->create();

			if ( $timetable instanceof \Illuminate\Database\Eloquent\Collection ) {
				$this->command->info( "Number of inserted timetable records: " . $timetable->count() );
			}

		}
	}
