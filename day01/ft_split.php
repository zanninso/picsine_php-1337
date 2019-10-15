<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    sort($ret);
    return ($ret);
}

print_r(ft_split("  Hello    World AAA  "));