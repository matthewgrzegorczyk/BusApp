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

	$factory->define( App\Models\Timetable::class, function ( Faker\Generator $faker ) {
		return [
			'day_type'  => $faker->randomElement( App\Models\Timetable::$allowed_day_types ),
			'depart_at' => $faker->dateTime->format( 'H:i' ),
			'bus_id'    => $faker->numberBetween( 1, 30 ),
		];
	} );

	$factory->define( \App\Models\Driver::class, function ( Faker\Generator $faker ) {
		return [
			'first_name' => $faker->firstName,
			'last_name'  => $faker->lastName,
			'jobs_taken' => $faker->numberBetween( 0, 200 ),
			'status'     => '',
		];
	} );
