<?php

namespace App\Helpers;

class PTHelper
{
    public static $answers = [
        '1' => 'A',
        '2' => 'B',
        '3' => 'C',
        '4' => 'D',
    ];

    public static function answerGet($index)
    {
        return self::$answers[$index] ?? 'Undefined';
    }

    public static $placementStatus = [
        '1' => '👨‍💻 Work',
        '2' => '🏁 Finish',
    ];

    public static function placementStatusGet($index){
        return self::$placementStatus[$index] ?? 'Undefined';
    }
}
