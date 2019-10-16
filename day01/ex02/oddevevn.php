#!/usr/bin/php
<?php
echo "Entrez un nombre: ";
while (FALSE !== ($line = fgets(STDIN))) {
    $raw_line = substr_replace($line, "", -1);
    $line = substr_replace($line, "", -1);
    if(!is_numeric($line))
        echo "'$raw_line' n'est pas un chiffre\n";
    else if(intval($line) % 2)
        echo "Le chiffre $raw_line est Impair\n";
    else 
        echo "Le chiffre $raw_line est Pair\n";
    echo "Entrez un nombre: ";
 }