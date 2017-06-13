<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use App\Models\BusLine;
	use App\Models\Timetable;
	use App\Models\Reservation;

	class AdminController extends Controller {

		public function index() {
			$data = [];

			return view( 'admin.index', $data );
		}

		public function reservations() {
			$data = [
				'reservations' => Reservation::all(),
			];

			return view('admin.reservations.index', $data);
		}
	}