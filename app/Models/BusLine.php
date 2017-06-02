<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusLine extends Model
{
    public function timetable() {
    	return $this->hasMany(Timetable::class);
	}
}
