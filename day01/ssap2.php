#!/usr/bin/php
<?php
function ft_split($arg)
{
    $ret = preg_split("/ +/", trim($arg));
    return ($ret);
}

function is_alpha($c)
{
    return (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z'));
}

array_shift($argv);
$list = array();
foreach ($argv as $value)
    $list = array_merge($list, ft_split($value));

sort($list, SORT_STRING | SORT_FLAG_CASE);
$list_num = array();
$list_other = array();
foreach ($list as $value) {
    if (is_alpha($value[0])) {
        echo "$value\n";
    } else if (is_numeric($value[0])) {
        array_push($list_num, $value);
    } else {
        array_push($list_other, $value);
    }
}
echo implode("\n", $list_num) . "\n";
echo implode("\n", $list_other) . "\n";