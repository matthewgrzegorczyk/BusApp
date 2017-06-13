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
	$home_settings       = [
//		'middleware' => 'auth',
	];
	$my_account_settings = [
		'middleware' => 'auth',
		'prefix'     => 'account',
	];
	$admin_settings      = [
//		'middleware' => 'auth',
		'prefix' => 'admin',
	];

	Route::group( $home_settings, function ( $router ) {
		$router->get( '/phpinfo', function () {
			phpinfo();
		} );
		$router->get( '/', 'HomeController@index' )->name( 'home' );
		$router->get( '/about', 'HomeController@about' )->name( 'about' );
		$router->get( '/timetables', 'HomeController@timetables' )->name( 'timetable' );
		$router->get( '/timetables/{bus_line}', 'HomeController@timetable' )
			->where( [ 'bus_line' => '[0-9]+' ] )->name( 'bus-timetable' );
		$router->get( '/timetables/{bus_line}/reserve', 'HomeController@reserve' )
			->where( [ 'bus_line' => '[0-9]+' ] )->name( 'reserve' );
		$router->post( '/timetables/{bus_line}/reserve', 'HomeController@postReserve' )
			->where( [ 'bus_line' => '[0-9]+' ] )->name( 'post-reserve' );
		$router->get( '/contact', 'HomeController@contact' )->name( 'contact' );
		$router->post( '/contact', 'HomeController@postContact' )->name( 'post-contact' );
	} );

	Route::group( $my_account_settings, function ( $router ) {
		$router->get( '/reservations', 'HomeController@myReservations' )->name( 'my-reservations' );
	} );

	Route::group( $admin_settings, function ( $router ) {
		$router->get( '/', 'AdminController@index' )->name( 'admin-index' );
//		$router->get( '/timetables', 'AdminController@timetables')->name('admin-timetable');
//		$router->get( '/timetables/create', 'AdminController@createTimetable')->name('admin-timetable-create');
//		$router->post( '/timetables/create', 'AdminController@postCreateTimetable')->name('admin-timetable-create');
//		$router->get( '/timetables/{id}', 'AdminController@editTimetable')->name('admin-timetable-edit');
//		$router->post( '/timetables/{id}', 'AdminController@postEditTimetable')->name('admin-timetable-edit');
//		$router->get( '/timetables/{id}/delete', 'AdminController@deleteTimetable')->name('admin-timetable-delete');

		$router->get( '/reservations', 'AdminController@reservations' )->name( 'admin-reservations' );
		$router->get( '/reservations/{reservation}/edit', 'AdminController@editReservation' )->name( 'admin-reservation-edit' );
		$router->post( '/reservations/{reservation}/edit', 'AdminController@saveReservation' )->name( 'admin-reservation-save' );
		$router->get( '/reservations/{reservation}/delete', 'AdminController@deleteReservation' )->name( 'admin-reservation-delete' );
	} );

	Auth::routes();
