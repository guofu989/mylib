<?php
namespace Guofu989\Mylib\Fun;

class Arr{
    //数组保留需要的字段
    //type 0二维数组 1一维数组
    public static function arrGenFields($arr, $fields, $type = 0)
    {
        foreach ($arr as $key => $value) {
            if ($type == 0) {
                foreach ($value as $k => $v) {
                    if (!in_array($k, $fields)) unset($arr[$key][$k]);
                }
            } else {
                if (!in_array($key, $fields)) unset($arr[$key]);
            }
        }
        return ($arr);
    }

    //二维数组根据某个字段分组
    public static function groupByField($arr,$field,$type=0){
        $data = [];
        foreach ($arr as $key => $value) {
            if($type == 0){ //分组之后一组多个
                $data[$value[$field]][] = $value;
            }else{ //分组之后一组一个
                $data[$value[$field]] = $value;
            }
        }
        return $data;
    }
}