<?php

namespace App\Helpers;

class MaskHelper
{
    public static function changePhoneMask($phone)
    {
        return "(".substr($phone,0,2).")".substr($phone,2,3)."-".substr($phone,5,2)."-".substr($phone,7,2);
    }

}
