<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
	static public $allowed_day_types = [
		'workday',
		'saturday',
		'holiday'
	];

    protected $table = 'timetable';

    public function bus() {
    	return $this->hasOne(BusLine::class);
	}
}
