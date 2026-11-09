<?php

/*
 * copyright 2026 October Tomasz Leszczyński tomi0001@gmail.com
 */

namespace App\Http\Controllers\Main;

use App\Services\Calendar\Calendar;

class MainController
{
    public function index($year = null, $month = null, $day = null)
    {
        $Calendar = new Calendar($year, $month, $day);

        return view('Users.Main.main')->with('year', $Calendar->year)->with('month', $Calendar->month)->with('day', $Calendar->day);

    }
}
