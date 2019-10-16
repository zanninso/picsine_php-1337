#!/usr/bin/php
<?php
if (sizeof($argv) == 2) {
    $op;
    $operator;
    if (preg_match("/^\d+(\+{1}|\-{1}|\*{1}|\%{1}|\/{1})\d+$/", $argv[1], $op)) {
        preg_match_all("/\d+/", $argv[1], $operator);
        switch ($op[1]) {
            case "+":
                echo ((int) $operator[0][0] + (int) $operator[0][1]) . "\n";
                break;
            case "-":
                echo ((int) $operator[0][0] - (int) $operator[0][1]) . "\n";
                break;
            case "*":
                echo ((int) $operator[0][0] * (int) $operator[0][1]) . "\n";
                break;
            case "/":
                echo ((int) $operator[0][0] / (int) $operator[0][1]) . "\n";
                break;
            case "%":
                echo ((int) $operator[0][0] % (int) $operator[0][1]) . "\n";
                break;
        }
    } else {
        echo "syntax error\n";
    }
} else {
    echo "Incorrect Parameters\n";
}
