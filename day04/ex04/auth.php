<?php
function auth($login, $passwd)
{
    $salt = "as545ldn56DAD_ayh@564";
    if(file_exists("private/passwd"))
    {
        $file = file_get_contents("private/passwd");
        $passwd = unserialize($file);
        foreach($passwd as $pswd)
            if($pswd["login"] == $login)
                return ($pswd["passwd"] == hash('whirlpool', $salt.$passwd));
    }
}