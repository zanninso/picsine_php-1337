#!/usr/bin/php
<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}

function comparable($a, $b)
{
    $ascii = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    $b = strtolower($b);
    $a = strtolower($a);
    $i = 0;
    while($a[$i] && $b[$i] && $a[$i] == $b[$i])
        $i++;
    return(strpos($ascii, $a[$i]) - strpos($ascii, $b[$i]));
}

array_shift($argv);
$list = array();
foreach ($argv as $value)
    $list = array_merge($list, ft_split($value));
usort($list, "comparable");
foreach($list as $value)
   echo "$value\n";

     