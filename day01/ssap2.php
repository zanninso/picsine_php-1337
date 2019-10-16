<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}

function comparable($a, $b)
{
    if(is_alphabet($a) && is_numeric($b))
        return(strcmp($a,$b));
    if(is_numeric($a) || is_numeric($b))
    {
        if(is_alphabet($a) || is_alphabet($b))
            return(is_alphabet($a) ? -1 : 1);
        if(!is_numeric($a) || !is_numeric($b))
            return(!is_numeric($a) ? -1 : 1);
        return(strcmp($a,$b));
    }
    if(is_alphabet($a) || is_alphabet($a))
        return(is_alphabet($a) ? -1 : 1);
    return(strcmp($a,$b));
}

array_shift($argv);
$list = array();
foreach($argv as $value)
    $list = array_merge($list, ft_split($value)); 
usort($list, "compar");
foreach($list as $value)
   echo "$value\n";