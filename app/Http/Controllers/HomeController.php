<?php

	namespace App\Http\Controllers;

	
	use Illuminate\Database\Eloquent\Collection;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Mail;

	use Carbon\Carbon;

	use App\Mail\ContactEmailReceived;
	use App\Models\Reservation;
	use App\Models\BusLine;
	use App\Models\Timetable;

	class HomeController extends Controller {

		public function __construct( Request $request ) {

		}

		public function index( Request $request ) {
			$data = [];

			return view( 'index', $data );
		}

		public function about() {
			$data = [];

			return view( 'about', $data );
		}

		public function timetables() {
			$bus_lines = BusLine::all();
			$data      = [
				'bus_lines' => $bus_lines,
			];

			return view( 'timetable', $data );
		}

		public function timetable( BusLine $bus_line ) {
			$bus_lines = BusLine::get();
			$timetable = Timetable::where( 'bus_id', $bus_line->id )->orderBy( 'depart_at' )->get();
			$day_types = Timetable::$allowed_day_types;

			$timetable = $timetable->groupBy( 'day_type' );
			foreach ( $timetable as $day_type => $col ) {
				$timetable[ $day_type ] = $col->groupBy( function ( $item, $key ) {
					$parts = explode( ':', $item->depart_at );

					return intval( $parts[ 0 ] );
				} );
			}

			$data = [
				'bus_lines'    => $bus_lines,
				'current_line' => $bus_line,
				'timetable'    => $timetable,
				'day_types'    => $day_types,
			];

			return view( 'timetable', $data );
		}

		public function reserve( BusLine $bus_line, Timetable $timetable ) {
			$data = [
				'ticket_types' => array_merge( [ '' => trans( 'page.reserve.placeholders.ticket_type' ) ], Reservation::$ticket_types ),
				'bus_line'     => $bus_line,
				'timetable'    => $timetable
			];

			return view( 'reserve', $data );
		}

		public function postReserve( Request $request, BusLine $bus_line, Timetable $timetable ) {
			$rules = [
				'amount'      => 'required|numeric',
				'type'        => 'required',
				'destination' => 'required',
				'full_name'   => 'required',
			];
			$this->validate( $request, $rules );

			$fields                      = $request->all();
			$reservation                 = new Reservation;
			$reservation->tickets_amount = $fields[ 'amount' ];
			$reservation->ticket_type    = $fields[ 'type' ];
			$reservation->destination    = $fields[ 'destination' ];
			$reservation->full_name      = $fields[ 'full_name' ];
			$reservation->bus_id         = $bus_line->id;
			$reservation->date           = Carbon::parse($timetable->depart_at)->format('Y-m-d H:i:s');
			$reservation->timetable_id   = $timetable->id;

			$user                 = $request->user();
			$reservation->user_id = ( $user !== null ) ? $user->id : null;
			$status               = $reservation->save();

			return ( $status ) ? redirect( route( 'my-reservations' ) ) : back();
		}

		public function contact() {
			$data = [];

			return view( 'contact', $data );
		}

		public function postContact( Request $request ) {
			$rules = [
				'email'   => 'required|email',
				'content' => 'required',
			];
			$this->validate( $request, $rules );

			$data = [
				'email'   => $request->get( 'email' ),
				'content' => $request->get( 'content' ),
			];
			Mail::to( $request->get( 'email' ) )->send( new ContactEmailReceived( $data ) );


			$successful = [
				'message' => 'Twoja wiadomośc została poprawnie wysłana',
			];

			return view( 'contact', $successful );
		}


		public function myReservations( Request $request ) {
			$user         = $request->user();
			$reservations = Reservation::where( 'user_id', $user->id )->get();

			$data = [
				'reservations' => $reservations,
			];

			return view( 'my-reservations', $data );
		}
	}