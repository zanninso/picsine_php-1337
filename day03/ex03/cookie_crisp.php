<?php
if($_GET["action"] && $_GET["value"] && $_GET["name"]) 
    switch ($_GET["action"])
    {
        case "del":
            setcookie($_GET["name"], "", 0);
        break;
        case "get":
            echo  $_COOKIE[$_GET['name']] ? "{$_COOKIE[$_GET['name']]}\n" : "";
        break;
        case "set":
            setcookie($_GET["name"], $_GET["value"], time()+3600);
        break;
    }
?>