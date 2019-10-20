<?php
function auth($login, $passwd)
{
    $salt = "as545ldn56DAD_ayh@564";
    if(file_exists("../private/passwd"))
    {
        $file = file_get_contents("../private/passwd");
        $users = $file ? unserialize($file) : [];
        foreach($users as $user)
            if($user["login"] == $login)
                return($user["passwd"] == hash('whirlpool', $salt.$passwd));
    }
}