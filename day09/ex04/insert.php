<?php
if((isset($_POST["id"]) && !empty($_POST["id"]) && isset($_POST["value"]) && !empty($_POST["value"])))
{
    file_put_contents(__DIR__ . '/list.csv',"\n".$_POST["id"] . ";" .$_POST["value"], FILE_APPEND);
}