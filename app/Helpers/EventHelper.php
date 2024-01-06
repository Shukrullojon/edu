<?php

namespace App\Helpers;

class EventHelper
{
    public static $eventStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function eventStatusGet($index)
    {
        return self::$eventStatus[$index] ?? 'Undefined';
    }

    public static $colors = [
        '4AD295',
        '00ff00',
        '0e111e',
        '4e191e',
        '9a6e3a',
        '6f42c1',
        '990055'
    ];
}
