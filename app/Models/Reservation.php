<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Reservation extends Model {
		static public $ticket_types = [
			'half_fare' => 'Ulgowy',
			'normal'    => 'Normalny',
		];

		public function user() {
			return $this->hasOne( User::class );
		}

		public function getTicketType() {
			return self::$ticket_types[$this->ticket_type] ?? '';
		}
	}
