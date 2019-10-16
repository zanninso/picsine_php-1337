<?php

if(sizeof($argv) == 4)
{
    $argv[1] = trim($argv[1]);
    $argv[2] = trim($argv[2]);
    $argv[3] = trim($argv[3]);
    if(!is_numeric($argv[1]) || !is_numeric($argv[3]) || !preg_match("/\+|\-|\% \/|*/", $argv[2]))
        echo "Incorrect Parameters\n";
    else
    switch($argv[2])
    {
        case : "+"
            echo (int)$argv[1] + (int)$argv[3])."\n";
        break;
        case : "-"
            echo (int)$argv[1] - (int)$argv[3])."\n";
        break;
        case : "*"
            echo (int)$argv[1] * (int)$argv[3])."\n";
        break;
        case : "/"
            echo (int)$argv[1] / (int)$argv[3])."\n";
        break;
        case : "%"
            echo (int)$argv[1] % (int)$argv[3])."\n";
        break;
    }
}
else    
echo "Incorrect Parameters\n";