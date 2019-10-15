<?php
if(sizeof($argv) == 2)
    echo preg_replace('/ +/', ' ', trim($argv[1]))."\n";