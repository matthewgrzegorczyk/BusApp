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
				'reservation'	=> $reservation,
				'ticket_types'	=> Reservation::$ticket_types,
			];
			return view('admin/reservations/edit', $data);
		}

		public function saveReservation(Request $request, Reservation $reservation) {

			$rules = [
				'amount'      => 'required|numeric',
				'type'        => 'required',
				'destination' => 'required',
				'full_name'   => 'required',
			];
			$this->validate( $request, $rules );

			$fields                      = $request->all();
			$reservation->tickets_amount = $fields[ 'amount' ];
			$reservation->ticket_type    = $fields[ 'type' ];
			$reservation->destination    = $fields[ 'destination' ];
			$reservation->full_name      = $fields[ 'full_name' ];
			$status = $reservation->save();
			return ($status) ? redirect(route('admin-reservations')) : back();


		}

		public function deleteReservation(Reservation $reservation) {
			$status = $reservation->delete();
			return ($status) ? redirect(route('admin-reservations')) : back();
		}
	}