<?php


namespace App\Helpers\Traits;


trait EloquentHelper
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
