<?php

namespace common\helpers;

use yii\base\Model;
class ExpdateHelper extends Model {


    /**
     * @param $package_id
     *
     * @return string
     */
    public static function setExpdate($package_type,$time) {
        switch ($package_type) {
            case "one_day";
                $date = 86400;
                break;
            case "two_days";
                $date = 86400*2;
                break;
            case "seven_days";
                $date = 86400*7;
                break;
            case "one_month";
                $date = 86400*30;
                break;
            case "three_months";
                $date = 86400*90;
                break;
            case "six_months";
                $date = 86400*30*6;
                break;
            case "one_year";
                $date = 86400*30*12;
                break;
            case "two_years";
                $date = 86400*30*24;
                break;
            default :
                $date = "NULL";
        }
        return $date+$time;
    }


}
