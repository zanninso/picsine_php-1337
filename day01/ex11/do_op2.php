#!/usr/bin/php
<?php
if (sizeof($argv) == 2) {
    $op;
    $argv[1] = trim($argv[1], " ");
    if (preg_match_all("/^(\d+) *(\+{1}|\-{1}|\*{1}|\%{1}|\/{1}) *(\d+)$/", $argv[1], $op)) {
        switch ($op[2][0]) {
            case "+":
                echo ((int) $op[1][0] + (int) $op[3][0]) . "\n";
                break;
            case "-":
                echo ((int) $op[1][0] - (int) $op[3][0]) . "\n";
                break;
            case "*":
                echo ((int) $op[1][0] * (int) $op[3][0]) . "\n";
                break;
            case "/":
                echo ((int) $op[1][0] / (int) $op[3][0]) . "\n";
                break;
            case "%":
                echo ((int) $op[1][0] % (int) $op[3][0]) . "\n";
                break;
        }
    } else {
        echo "Syntax Error\n";
    }
} else {
    echo "Incorrect Parameters\n";
}
