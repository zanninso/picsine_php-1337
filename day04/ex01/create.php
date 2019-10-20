<?php
if ($_POST["submit"] == "OK" && $_POST["login"] != "" && $_POST["passwd"] != "")
{
    $error = 0;
    $salt = "as545ldn56DAD_ayh@564";
    $users = [];
    if(!file_exists("../private"))
        mkdir("../private", 0777, true);
    if(file_exists("../private/passwd"))
    {
        $file = file_get_contents("../private/passwd");
        $users = $file ? unserialize($file) : [];
    }    
    foreach($users as $user)
    {
        if($user["login"] ==  $_POST["login"])
        {
            $error = 1;
            echo "ERROR\n";
            break;
        }
    }
    if(!$error)
    {
        $users[] = array("login" => $_POST["login"],"passwd" => hash('whirlpool', $salt.$_POST["passwd"]));
        file_put_contents("../private/passwd",serialize($users));
        echo "OK\n";
    }
}
else 
    echo "ERROR\n";
?>