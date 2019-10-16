#!/usr/bin/php
<?php
if(($size = sizeof($argv)) > 2)
{
    $arr = array();
    for($i = 2; $i < $size; $i++)
    {
        $key_val = explode(':',$argv[$i]);
        if(sizeof($key_val) == 2)
            $arr[$key_val[0]] = $key_val[1];
    }
    if(isset($arr[$argv[1]]))
        echo $arr[$argv[1]]."\n";
}