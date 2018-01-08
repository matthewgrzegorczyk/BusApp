<?php

use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = factory(App\Models\Reservation::class, 300)->create();

		if ( $reservations instanceof \Illuminate\Database\Eloquent\Collection ) {
			$this->command->info( "Number of inserted reservations records: " . $reservations->count() );
		}
    }
}
