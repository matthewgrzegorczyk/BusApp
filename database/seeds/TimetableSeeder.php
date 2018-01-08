<?php

use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Timetable::class, 3000)->create();
    }
}
