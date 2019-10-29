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
        $return = array();
        $period = CarbonPeriod::create($first_day, $last_days);
        foreach ($period as $date) {
            $return[] = $date->format('d-m-Y');
        }
//        return $period->toArray();
        return $return;
    }
}