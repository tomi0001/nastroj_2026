<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Mood extends Model
{
    protected $fillable = ['id_users', 'start_day', 'date'];

    public function downloadMoods()

    {
        

        return Mood::selectRaw('moods.id as id')
            ->selectRaw('moods.date_start as date_start')
            ->selectRaw('moods.date_end as date_end')
            ->selectRaw('moods.level_mood as level_mood')
            ->selectRaw('moods.level_anxiety as level_anxiety')
            ->selectRaw('moods.level_nervousness as level_nervousness')
            ->selectRaw('moods.level_stimulation  as level_stimulation')
            ->selectRaw('moods.number_awakenings as number_awakenings')
            ->selectRaw('moods.type as type')
            ->selectRaw(' ((unix_timestamp(date_end)  - unix_timestamp(date_start)) * level_mood) as average_mood')
            ->selectRaw('((unix_timestamp(date_end)  - unix_timestamp(date_start)) * level_anxiety) as average_anxiety')
            ->selectRaw('((unix_timestamp(date_end)  - unix_timestamp(date_start)) * level_nervousness) as average_nervousness')
            ->selectRaw('((unix_timestamp(date_end)  - unix_timestamp(date_start)) * level_stimulation) as average_stimulation')
            ->selectRaw("(DATE(IF(HOUR(    moods.date_start) >= ? , moods.date_start,Date_add(moods.date_start, INTERVAL - 1 DAY) )) ) as datStart ",[$this->getAttributes()['start_day']] )
            ->selectRaw("(DATE(IF(HOUR(    moods.date_end) >= ? ,  moods.date_end,Date_add(moods.date_end, INTERVAL - 1 DAY) )) ) as datEnd",[$this->getAttributes()['start_day']] )
            ->selectRaw('moods.what_work  as what_work ')
            ->where('moods.id_users', $this->getAttributes()['id_users'])
            ->whereRaw("(DATE(IF(HOUR(    moods.date_end) >= ? ,  moods.date_end,Date_add(moods.date_end, INTERVAL - 1 DAY) )) ) = ?", [$this->getAttributes()['start_day'], $this->getAttributes()['date']])
            ->orderBy('moods.date_start')
            ->get();
    }
}
