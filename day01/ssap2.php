<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}
function compar($a, $b)
{
    if(is_numeric($a) || is_numeric($b))
        return();
}
array_shift($argv);
$list = array();
foreach($argv as $value)
    $list = array_merge($list, ft_split($value)); 
usort($list, "compar");
foreach($list as $value)
   echo "$value\n";