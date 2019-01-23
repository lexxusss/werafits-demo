<?php

namespace App\Helpers;


trait EnumHelper
{
    public static function getConsts()
    {
        $oClass = new \ReflectionClass(__CLASS__);

        return collect($oClass->getConstants());
    }
}
