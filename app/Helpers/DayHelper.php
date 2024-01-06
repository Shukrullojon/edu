<?php

namespace App\Helpers;

class DayHelper{
    public static $dayList = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];

    public static function getDay($index){
        $name = self::$dayList[$index] ?? 'Undefined';
        return $name;
    }
}
