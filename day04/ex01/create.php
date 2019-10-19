<?php
if ($_POST["submit"] == "OK")
{
    $error = 0;
    $salt = "as545ldn56DAD_ayh@564";
    $passwd = array();
    if(file_exists("private/passwd"))
    {
        $file = file_get_contents("private/passwd");
        $passwd = unserialize($file);
    }
    else
        mkdir("private", 0777, true);
    foreach($passwd as $pswd)
    {
        if($pswd["login"] ==  $_POST["login"])
        {
            $error = 1;
            echo "ERROR\n";
            break;
        }
    }
    if(!$error)
    {
        $passwd[] = array("login" => $_POST["login"],"passwd" => hash('whirlpool', $salt.$_POST["passwd"]));
        file_put_contents("private/passwd",serialize($passwd));
    }
    print_r($passwd);
}
?>