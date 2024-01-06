<?php

namespace App\Helpers;

class TypeHelper{
    public static $dayType = [
        '1' => 'Every',
        '2' => 'One time',
    ];

    public static function getDayType($index){
        return self::$dayType[$index] ?? 'Undefined';
    }

    public static $salaryType = [
        '1' => 'Month',
        '2' => 'KPI',
        '3' => 'Hourly',
        '4' => 'Add Student',
        '5' => 'Active Student',
    ];

    public static function getSalaryType($index){
        return self::$salaryType[$index] ?? 'Undefined';
    }

    public static $groupDayType = [
        1 => 'Every Day',
        2 => 'Du-Cho-Ju',
        3 => 'Se-Pa-Sha',
    ];

    public static function getGroupDayType($index){
        return self::$groupDayType[$index] ?? 'Undefined';
    }

    public static $paymentType = [
        1 => '💰 Naqt',
        2 => '💳 Plastik Karta',
        3 => '🔄 Perevod',
    ];

    public static function getPaymentType($index){
        return self::$paymentType[$index] ?? 'Undefined';
    }

    public static $smsType = [
        1 => 'Birthday',
        2 => 'Add group',
        3 => 'Change group',
        4 => 'Probniy dars',
        5 => 'Qarzdorlig',
        6 => 'Payment',
        7 => 'Kelmadi',
        8 => 'Kech keldi',
        10 => 'Reset Password',
    ];

    public static function getSmsType($index){
        return self::$smsType[$index] ?? 'Undefined';
    }

    public static $detailType = [
        '1' => 'One time',
        '2' => 'Every time',
    ];

    public static function getDetailType($index){
        return self::$detailType[$index] ?? 'Undefined';
    }

}
