#!/usr/bin/php
<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}

if(sizeof($argv) >= 2)
{
    $argv = ft_split($argv[1]);
    array_push($argv,$argv[0]);
    array_shift($argv);
    echo trim(implode ( " ", $argv))."\n";
}