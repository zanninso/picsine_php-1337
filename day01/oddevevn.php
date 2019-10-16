<?php
while (FALSE !== ($line = fgets(STDIN))) {
    $raw_line = substr_replace($line, "", -1);
    $line = trim($line);
    if(!is_numeric($line))
        echo "'$raw_line' n'est pas un chiffre\n";
    else if((int)$line % 2)
        echo "le chiffre $raw_line est impair\n";
    else 
        echo "le chiffre $raw_line est pair\n";
 }