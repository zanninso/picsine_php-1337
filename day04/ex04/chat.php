<?php
session_start();
    if($_SESSION["loggued_on_user"] != "" && file_exists("../private/chat"))
    {
        $fp = fopen("../private/chat","r");
        $file = NULL;
        if (flock($fp, LOCK_SH))
        {
            $file = file_get_contents("../private/chat");
            flock($fp,LOCK_UN);
            fclose($fp);
        }
        date_default_timezone_set("UTC");
        $messages = ($file ? unserialize($file) : []);
        foreach($messages as $msg)
            echo '['.date('h:i', $msg["time"]).'] <b>'.$msg["login"].'</b>: '.$msg["msg"].'<br/>';
    }