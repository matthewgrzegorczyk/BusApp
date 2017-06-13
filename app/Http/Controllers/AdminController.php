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

		public function editReservation(Reservation $reservation) {
			$data = [
				'reservation' => $reservation,
				'ticket_types' => Reservation::$ticket_types,
			];
			return view('admin/reservations/edit', $data);
		}

		public function saveReservation(Request $request, Reservation $reservation) {

		}

		public function deleteReservation(Reservation $reservation) {

		}
	}