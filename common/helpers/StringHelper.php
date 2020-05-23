<?php

namespace common\helpers;

use yii\base\Model;
class StringHelper extends Model {


    /**
     * @param $package_id
     *
     * @return string
     */
    public static function radom($lenght) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLenght = strlen($characters);
        $stringRadom='';
        for ($i=0; $i <$lenght ; $i++) {
            $stringRadom .= $characters[rand(0,$charactersLenght-1)];
        }
        return $stringRadom;
    }


}