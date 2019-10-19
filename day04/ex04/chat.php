<?php
    $salt = "as545ldn56DAD_ayh@564";
    if(file_exists("private/chat"))
    {
        $file = file_get_contents("private/passwd");
        $messages = unserialize($file);
        foreach($messages as $msg)
        {
            echo '['.09:42.']<b>'.$msg["user"].'</b>:'.$msg["user"]'<br/>';
        }
    }