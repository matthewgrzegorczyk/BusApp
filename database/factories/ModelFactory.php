<?php

	/*
	|--------------------------------------------------------------------------
	| Model Factories
	|--------------------------------------------------------------------------
	|
	| Here you may define all of your model factories. Model factories give
	| you a convenient way to create models for testing and seeding your
	| database. Just tell the factory how a default model should look.
	|
	*/

	/** @var \Illuminate\Database\Eloquent\Factory $factory */
	$factory->define( App\Models\User::class, function ( Faker\Generator $faker ) {
		static $password;

		return [
			'name'           => $faker->name,
			'email'          => $faker->unique()->safeEmail,
			'password'       => $password ?: $password = bcrypt( 'secret' ),
			'remember_token' => str_random( 10 ),
		];
	} );

	$factory->define( App\Models\BusLine::class, function ( Faker\Generator $faker ) {

		return [
			'name'         => $faker->name,
			'journey_name' => $faker->streetName,
			'price'        => $faker->randomFloat( 2, 4, 20 ),
		];

	} );

//	$factory->define( App\Models\Timetable::class, function ( Faker\Generator $faker ) {
//		return [
//			'day_type'  => $faker->randomElement( App\Models\Timetable::$allowed_day_types ),
//			'depart_at' => $faker->dateTime->format( 'H:i' ),
//			'bus_id'    => $faker->numberBetween( 1, 30 ),
//		];
//	} );

	$factory->define( App\Models\Driver::class, function ( Faker\Generator $faker ) {
		return [
			'first_name' => $faker->firstName,
			'last_name'  => $faker->lastName,
			'jobs_taken' => $faker->numberBetween( 0, 200 ),
			'status'     => '',
			'bus_id'     => $faker->numberBetween( 1, 30 ),
		];
	} );

	$factory->define( App\Models\Timetable::class, function ( Faker\Generator $faker ) {
		$bus_lines = \App\Models\BusLine::all()->pluck( 'id' )->toArray();

		return [
			'day_type'  => $faker->randomElement( \App\Models\Timetable::$allowed_day_types ),
			'depart_at' => $faker->dateTimeBetween( '-1 year', 'now' ),
			'bus_id'    => $faker->randomElement( $bus_lines ),
		];
	} );

	$factory->define( App\Models\Reservation::class, function ( Faker\Generator $faker ) {
		$bus_lines  = \App\Models\BusLine::all()->pluck( 'id' )->toArray();
		$users      = App\Models\User::all()->pluck( 'id' )->toArray();
		$timetables = App\Models\Timetable::all()->pluck( 'id' )->toArray();

		return [
			'tickets_amount' => $faker->numberBetween( 1, 5 ),
			'ticket_type'    => $faker->randomElement( array_keys( \App\Models\Reservation::$ticket_types ) ),
			'destination'    => $faker->city,
			'full_name'      => $faker->firstName . ' ' . $faker->lastName,
			'date'           => $faker->dateTimeBetween( '-1 year', 'now' ),
			'user_id'        => $faker->randomElement( $users ),
			'bus_id'         => $faker->randomElement( $bus_lines ),
			'timetable_id'   => $faker->randomElement( $timetables ),
		];
	} );
