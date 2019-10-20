<?php
if ($_POST["submit"] == "OK" && $_POST["login"] != "" && $_POST["oldpw"] != "" && $_POST["newpw"] != "")
{
    $error = 1;
    $salt = "as545ldn56DAD_ayh@564";

    $file = file_get_contents("../private/passwd");
    $users= $file ? unserialize($file) : [];
    foreach($users as &$user)
    {
        if($user["login"] ==  $_POST["login"])
        {
            if($user["passwd"] == hash('whirlpool', $salt.$_POST["oldpw"]))
            {
                $error = 0;
                $user["passwd"] = hash('whirlpool', $salt.$_POST["newpw"]);
                file_put_contents("../private/passwd",serialize($users));
                echo "OK";
            }
            break;
        }
    }
    if($error)
        echo "ERROR\n";
}
else 
    echo "ERROR2\n";