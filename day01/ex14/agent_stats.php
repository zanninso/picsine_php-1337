#!/usr/bin/php
<?php
function moyenne1($Data)
{  
    $moyenne = 0;
    $size = 0;
    foreach($Data as $key => $value)
        foreach($value as $note)
            if(strcmp($note[2], "moulinette") && $note[1] != '')
            {
                $size++;
                $moyenne += intval($note[1]);
            }
    echo ($moyenne / $size)."\n";
}

function moyenne2($Data, $type)
{
    foreach($Data as $key => $value)
    {
        echo $value[0][0].":";
        $moyenne = 0;
        $size = 0;
        $moulinette = 0;
        foreach($value as $note)
        {
            if(strcmp($note[2], "moulinette") == 0 && $note[1] != '')
                $moulinette += intval($note[1]);
            else if(strcmp($note[2], "moulinette") && $note[1] != '')
            {
                $size++;
                $moyenne += intval($note[1]);
            }
        }
        echo ($type == "moyenne_user" ? ($moyenne / $size) : (($moyenne / $size) - $moulinette))."\n";
    }
}

if($argc == 2)
{
    $Data = array();
    fgets(STDIN);
    while (FALSE !== ($line = fgets(STDIN)))
    {
        $string  = explode(";",$line);
        if(!isset($Data[$string[0]]))
            $Data[$string[0]] = array();
        array_push($Data[$string[0]], array($string[0],$string[1],$string[2],$string[3]));
    }
    sort($Data);
    $argv[1] == "moyenne" ? moyenne1($Data) : moyenne2($Data,$argv[1]);
}
