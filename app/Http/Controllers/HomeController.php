<?php

	namespace App\Http\Controllers;

	use Illuminate\Database\Eloquent\Collection;
	use Illuminate\Http\Request;

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

		public function timetable( $bus_line ) {
			$bus_lines = BusLine::get();
			$timetable = Timetable::where( 'bus_id', $bus_line )->orderBy( 'depart_at' )->get();
			$day_types = Timetable::$allowed_day_types;

			$timetable = $timetable->groupBy( 'day_type' );
			foreach ( $timetable as $day_type => $col ) {
				$timetable[ $day_type ] = $col->groupBy( function ( $item, $key ) {
					$parts = explode( ':', $item->depart_at );

					return intval( $parts[ 0 ] );
				} );
			}

			$data = [
				'bus_lines' => $bus_lines,
				'current_line' => $bus_line,
				'timetable' => $timetable,
				'day_types' => $day_types,
			];

			return view( 'timetable', $data );
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
		}
	}