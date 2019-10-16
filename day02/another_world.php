#!/usr/bin/php
<?php
if(sizeof($argv) == 2)
    echo preg_replace('/ +|\t+/', ' ', trim($argv[1]))."\n";