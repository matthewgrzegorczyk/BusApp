<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/
	$settings = [
		'middleware' => 'auth',
	];

	Route::group( $settings, function ( $router ) {
		$router->get( '/', 'HomeController@index' )->name( 'home' );
		$router->get( '/about', 'HomeController@about' )->name( 'about' );
		$router->get( '/timetables', 'HomeController@timetables' )->name( 'timetable' );
		$router->get( '/timetables/{bus_line}', 'HomeController@timetable' )
			->where( [ 'bus_line' => '[0-9]+' ] )->name( 'bus_timetable' );
		$router->get( '/contact', 'HomeController@contact' )->name( 'contact' );
		$router->post( '/contact', 'HomeController@postContact' )->name( 'postContact' );
	} );

	Auth::routes();
