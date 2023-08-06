<?php

namespace Core;

class Validation
{

    public static function string($value,$min,$max){
        $value = trim($value);
        return strlen($value)>= $min && strlen($value)<=$max;
    }

    public static function email($email){
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function phone($number){

        return true;
    }

}