<?php

namespace App\Helpers;

class StatusHelper
{
    public static $positionStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function positionStatusGet($index)
    {
        return self::$positionStatus[$index] ?? 'Undefined';
    }

    public static $taskStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function taskStatusGet($index)
    {
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $studentStatus = [
        '1' => '⏳ Waiting',
        '2' => '✅Active',
        '3' => '👨‍🎓 All',
        '0' => '📦 Archive',
    ];

    public static function studentStatusGet($index)
    {
        return self::$studentStatus[$index] ?? 'Undefined';
    }

    public static $adminStatus = [
        '0' => '📦 Archive',
        '1' => '✅ Active',
        '2' => '🙅‍♂️ Otpuska',
        '3' => '🤕 Ill',
    ];

    public static function adminStatusGet($index)
    {
        return self::$adminStatus[$index] ?? 'Undefined';
    }

    public static $filialStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function filialStatusGet($index)
    {
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $courceStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function courceStatusGet($index)
    {
        return self::$taskStatus[$index] ?? 'Undefined';
    }

    public static $roomStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function roomStatusGet($index)
    {
        return self::$roomStatus[$index] ?? 'Undefined';
    }

    public static $paymentStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function paymentStatusGet($index)
    {
        return self::$paymentStatus[$index] ?? 'Undefined';
    }

    public static $salaryStatus = [
        '0' => '✅ Active',
        '1' => '📦 Archive',
    ];

    public static function salaryStatusGet($index)
    {
        return self::$salaryStatus[$index] ?? 'Undefined';
    }

    public static $groupStatus = [
        1 => '🆕 New Group',
        2 => '✅ Open Group',
        3 => '🔐 Close Group',
    ];

    public static function groupStatusGet($index)
    {
        return self::$groupStatus[$index] ?? 'Undefined';
    }

    public static $groupDetailStatus = [
        1 => '✅ Active',
        0 => '❌ Close',
    ];

    public static function groupDetailStatusGet($index){
        return self::$groupDetailStatus[$index] ?? 'Undefined';
    }

    public static $payStatus = [
        '0' => '❌ No Pay',
        '1' => '❕ Later',
        '2' => '✅ Pay',
    ];

    public static function payStatusGet($index)
    {
        return self::$payStatus[$index] ?? 'Undefined';
    }

    public static $roomVsTeacherStatus = [
        '1' => '✅ Active',
        '0' => '📦 Archive',
    ];

    public static function roomVsTeacherStatusGet($index)
    {
        return self::$roomVsTeacherStatus[$index] ?? 'Undefined';
    }

    public static $smsStatus = [
        '0' => '❌',
        '1' => '✅',
    ];

    public static function getSmsStatus($index)
    {
        return self::$smsStatus[$index] ?? 'Undefined';
    }
}
