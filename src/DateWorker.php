<?php
use Carbon\CarbonPeriod;
class DateWorker
{
    public static function getTodaydate()
    {
        return date('d m Y');
    }

    public static function getArrayOfDays($first_day, $last_days)
    {
        $period = CarbonPeriod::create($first_day, $last_days);
//        foreach ($period as $date) {
//            echo $date->format('Y-m-d');
//        }
        return $period->toArray();
    }
}