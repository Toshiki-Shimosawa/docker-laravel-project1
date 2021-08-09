<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class DateTimeHelper extends Model
{
    public static function dateTimeParameter($datetime)
    {
        $date_time = new Carbon($datetime);

        return $date_time->toDateTimeString();
    }

    public static function dateParameter($datetime)
    {
        $date_time = new Carbon($datetime);

        return $date_time->toDateString();
    }
}
