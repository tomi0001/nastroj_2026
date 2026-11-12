<?php

/*
 * copyright 2026 October Tomasz Leszczyński tomi0001@gmail.com
 */

namespace App\Http\Controllers\Main;

use App\Services\Calendar\Calendar;
use App\Services\Mood\Mood;
use Illuminate\Http\Request;

class MainController
{
    public function index( int|null $year = null, int|null $month = null, int|null $day = null)
    {
        $Calendar = new Calendar($year, $month, $day);
        $Mood = new Mood($Calendar->year.'-'.$Calendar->month.'-'.$Calendar->day);
        $listMoods = $Mood->downloadMoods();

        return view('Users.Main.main')->with('year', $Calendar->year)
            ->with('month', $Calendar->month)
            ->with('day', $Calendar->day)
            ->with('listMoods', $listMoods);

    }
}
