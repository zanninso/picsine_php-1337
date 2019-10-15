<?php
while (FALSE !== ($line = fgets(STDIN))) {
    $line = trim($line);
    if(!is_numeric($line))
        echo "'$line' n'est pas un chiffre\n";
    else if((int)$line % 2)
        echo "le chiffre $line est impair\n";
    else 
        echo "le chiffre $line est pair\n";
 }