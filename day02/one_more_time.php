#!/usr/bin/php
<?php
$matchs;
if($argc == 2)
if(preg_match_all("/^(\w+) (\d{1,2}) (\w+) (\d{4}) (\d{2}:\d{2}:\d{2})$/",$argv[1],$matchs))
{
    $days =["Lundi", "Mardi", "Mercredi","Jeudi", "Vendredi", "Samedi", "Dimanche"];
    $mounth = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    $matchs[2][0] = (int)$matchs[2][0];
    $time = explode(":", $matchs[5][0]);
    if(in_array(ucfirst($matchs[1][0]),$days) && in_array(ucfirst($matchs[3][0]), $mounth) && ($matchs[2][0] > 0 && $matchs[2][0] < 32) && $time[1] < 60 && $time[2] < 60 && $time[0] < 24)
    {
        date_default_timezone_set("Europe/Paris");
        echo mktime($time[0],$time[1],$time[2],array_search($matchs[3][0], $mounth) + 1,$matchs[2][0],$matchs[4][0])."\n";
    }
    else 
    echo "Wrong Format2\n";
}
else 
echo "Wrong Format\n";