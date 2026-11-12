<?php

/*
 * copyright 2020 Tomasz Leszczyński tomi0001@gmail.com
 * Edition 2021
 */

namespace App\Services\Mood;

use App\Models\Mood as MoodModel;
use Illuminate\Http\Request;
use Auth;

class Mood
{
    public int $id_users;

    public int $start_day;

    public string $date;

    public function __construct(string $date)
    {

        $this->id_users = Auth::user()->id;
        $this->start_day = Auth::user()->start_day;
        $this->date = $date;
    }

    public function downloadMoods()
    {
        $Mood = new MoodModel;
        $Mood->fill(['id_users' => $this->id_users, 'start_day' => $this->start_day, 'date' => $this->date]);
        $listMoods = $Mood->downloadMoods();
        return $listMoods;
    }
}
