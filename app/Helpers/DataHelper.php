<?php
namespace App\Helpers;
use phpDocumentor\Reflection\Types\Array_;

class DataHelper{
    public static function catsToArray($cats){
        $arr = [];
        for($i = 0;$i<$cats->count();$i++){
            $arr[$i] = $cats[$i]->id;
        }
        return $arr;
    }
}
