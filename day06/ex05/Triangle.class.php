<?php
class Triangle
{
    static $verbose = false;

    static function doc()
    {
        echo "";
    }

    function __construct(array $arr)
    {
        if(!isset($arr["A"]) || !isset($arr["C"]) || !isset($arr["B"]))
            __destruct();
        if(self::$verbose)
            echo "";
    }


    function destruct()
    {
        if(self::$verbose)
            echo "";
    }
}