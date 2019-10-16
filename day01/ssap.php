#!/usr/bin/php
<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}
array_shift($argv);
$list = array();
foreach($argv as $value)
    $list = array_merge($list, ft_split($value)); 
sort($list);
foreach($list as $value)
   echo "$value\n";