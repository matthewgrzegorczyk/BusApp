<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Driver extends Model {

		protected $table = 'drivers';

		public function busLine() {
			return $this->belongsTo( BusLine::class, 'bus_id' );
		}

	}
