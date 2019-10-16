#!/usr/bin/php
<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg, " "));
    sort($ret);
    return ($ret);
}