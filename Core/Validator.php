<?php

namespace Core;

class Validator {
    //this is a pure function we can access it like ClassName::functionName
    public static function string($value, $min = 1, $max = INF) 
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}